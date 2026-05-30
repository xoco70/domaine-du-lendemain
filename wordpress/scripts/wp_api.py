#!/usr/bin/env python3
"""Client REST WordPress minimal (stdlib uniquement).

Authentification HTTP Basic via un « Application Password ».

Variables d'environnement :
    WP_SITE_URL        ex. https://dev.johe6239.odns.fr
    WP_USER            login WordPress (PAS l'email), ex. johe6239
    WP_APP_PASSWORD    mot de passe d'application (espaces tolérés)
"""

import base64
import json
import os
import sys
import urllib.error
import urllib.request


class WPClient:
    def __init__(self, site=None, user=None, app_password=None):
        self.site = (site or os.environ.get("WP_SITE_URL", "")).rstrip("/")
        self.user = user or os.environ.get("WP_USER", "")
        password = app_password or os.environ.get("WP_APP_PASSWORD", "")
        self.password = password.replace(" ", "")

        if not (self.site and self.user and self.password):
            sys.exit(
                "Configuration manquante : définissez WP_SITE_URL, WP_USER et "
                "WP_APP_PASSWORD."
            )

        token = base64.b64encode(
            f"{self.user}:{self.password}".encode("utf-8")
        ).decode("ascii")
        self.auth_header = f"Basic {token}"

    def request(self, method, path, data=None, timeout=120):
        """Requête REST -> (status_code, corps_décodé)."""
        url = path if path.startswith("http") else f"{self.site}/wp-json{path}"
        body = None
        headers = {"Authorization": self.auth_header, "Accept": "application/json"}
        if data is not None:
            body = json.dumps(data).encode("utf-8")
            headers["Content-Type"] = "application/json"

        req = urllib.request.Request(url, data=body, headers=headers, method=method)
        try:
            with urllib.request.urlopen(req, timeout=timeout) as resp:
                raw = resp.read().decode("utf-8")
                return resp.status, (json.loads(raw) if raw else None)
        except urllib.error.HTTPError as exc:
            raw = exc.read().decode("utf-8", "replace")
            try:
                parsed = json.loads(raw)
            except json.JSONDecodeError:
                parsed = {"raw": raw[:500]}
            return exc.code, parsed
        except urllib.error.URLError as exc:
            return 0, {"error": str(exc)}

    def get(self, path, **kw):
        return self.request("GET", path, **kw)

    def post(self, path, data, **kw):
        return self.request("POST", path, data=data, **kw)

    def put(self, path, data, **kw):
        return self.request("PUT", path, data=data, **kw)

    def delete(self, path, **kw):
        return self.request("DELETE", path, **kw)


def main():
    """Test de connexion : `python3 wp_api.py`."""
    wp = WPClient()
    status, me = wp.get("/wp/v2/users/me?context=edit")
    if status == 200:
        caps = me.get("capabilities") or {}
        print(f"✅ Connecté : {me.get('name')} (id {me.get('id')}, {me.get('email', '')}).")
        print(f"   Administrateur : {'manage_options' in caps}")
    else:
        print(f"❌ Authentification impossible (HTTP {status}) : {me}")
        sys.exit(1)


if __name__ == "__main__":
    main()
