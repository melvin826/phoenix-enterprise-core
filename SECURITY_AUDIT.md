# PHOENIX Security Audit

Status: PHX-M0.6 — repository/runtime pre-bootstrap audit

## Scope

This audit covers the canonical repository `phoenx-online/phoenix` after organization transfer and canonical rename. It focuses on repository execution risk and the legacy runtime scaffold. It is not a production penetration test.

## Verified safe changes

- repository now lives under the dedicated PHOENIX organization
- repository numeric ID remained `1094814392` through transfer and rename
- branch and PR continuity are preserved
- the legacy `.github/workflows/deploy.yml` automatic production-like deployment path was physically removed
- no current workflow is authorized to deploy PHOENIX production from `main`
- PHOENIX has a documented independent product boundary from Craniumtek, MBG, and iBayong

## Current observations

### P0 — Legacy executable deployment path

**RESOLVED.**

The historical workflow deployed every `main` push to a DigitalOcean droplet using a GitHub-hosted runner, SSH as root, and legacy `/var/www/phoenix` assumptions. That workflow has been removed.

### P1 — Repository is public

**OPEN — deliberate owner decision required.**

The repository is currently public. Public visibility is not automatically wrong, but it should be intentional for a commercial product.

Before changing visibility, review Git history for accidentally committed secrets and decide whether PHOENIX is intended to be open source, source-available, or private proprietary software.

### P1 — Historical Docker Compose is not production-safe

**OPEN — must be replaced before runtime use.**

Current historical `docker-compose.yml` contains:

- MariaDB 10.6 despite the approved PostgreSQL architecture baseline
- literal example passwords `changeme` and `rootpass`
- fixed `container_name` values that weaken Compose project isolation
- direct host bindings for ports 80 and 443
- legacy service and volume assumptions

These values are historical examples, not approved runtime configuration.

### P1 — Historical `.env.example` is misleading

**OPEN — modernize before DEV bootstrap.**

The current example declares:

- `APP_ENV=production`
- MySQL as the database
- `DB_PASSWORD=changeme`
- Redis as session/cache/queue infrastructure without a current runtime decision proving each use

No evidence indicates the example password is a live secret, but it must not be reused. The file should be replaced with a placeholder-only DEV-safe template during scaffold modernization.

### P1 — Historical Dockerfile is stale

**OPEN — modernize before runtime use.**

The Dockerfile uses PHP 8.2, installs MySQL extensions, copies the whole source tree, and performs `composer install --no-dev` at image build time. It reflects the earlier scaffold, not the approved modern PHOENIX DEV architecture.

### P1 — Legacy deploy directory and Nginx assumptions

**OPEN — audit before any reverse-proxy use.**

Files under `deploy/` are historical. They must not be assumed to represent the current host, TLS, domain, network, user, or file layout.

## Secrets policy

No runtime secret should be stored in the repository.

Required controls for the new DEV baseline:

- PHOENIX-only secrets
- no production secrets in DEV
- least-privilege service credentials
- private host environment files, preferably mode `600`
- no shared MBG/iBayong/Craniumtek credentials
- rotate any credential proven to have been publicly committed or otherwise exposed

## CI/CD policy

Approved direction:

- self-hosted PHOENIX runner for normal CI/CD
- no root runner
- no automatic production deployment from `main`
- explicit environment boundaries for DEV, staging, and production
- secrets scoped per environment
- deployments must be reversible and evidence-gated

## Runtime isolation policy

PHOENIX must have independent:

- Linux/service account where practical
- Docker project/network/volumes
- PostgreSQL database/user
- Redis boundary
- secrets
- logs
- backups
- runner
- deployment workflow

Shared physical hardware may be considered later, but shared application credentials or data stores are not allowed by default.

## Next security work

1. Perform a repository history secret scan before deciding whether to keep the repository public.
2. Modernize `.env.example` to placeholder-only values.
3. Replace the historical Compose and Dockerfile baseline with PostgreSQL-based DEV definitions.
4. Remove or quarantine superseded deploy files once their historical value is captured.
5. Add dependency/security checks to the self-hosted CI pipeline.
6. Add an application health endpoint and smoke test.
7. Document backup/restore for each environment.
8. Add staging and production threat/risk reviews before activation.

## Production authorization

None. This audit does not authorize a PHOENIX production deployment or DNS cutover.
