# PHOENIX GitHub Organization + Domain Migration Plan

Status: PHX-M0 execution plan

## Goal

Move PHOENIX from the historical personal repository into an independent GitHub organization while preserving Git history and keeping Craniumtek, Morning Breaks Global, and iBayong untouched.

## Target identity

- Product / brand: **PHOENIX**
- Primary domain: `phoenx.online`
- GitHub organization display name: **PHOENIX**
- GitHub organization account handle: **`phoenx-online`**
- GitHub organization URL: **`https://github.com/phoenx-online`**
- Canonical repository name: `phoenix`
- Canonical repository path: **`phoenx-online/phoenix`**

The product/brand spelling and domain spelling are intentionally different and must not be normalized automatically.

## Gate 1 — Create organization

**COMPLETED.** The organization exists at `github.com/phoenx-online`.

Canonical organization settings:

- organization display name: **PHOENIX**
- organization handle / URL slug: **`phoenx-online`**
- website: `https://phoenx.online`
- billing: Free unless a paid capability is explicitly required
- base repository permission: None or Read
- require 2FA for organization members when feasible
- do not invite contractors before teams/permissions are defined

## Gate 1A — Connect GitHub integration

**COMPLETED.** The GitHub app/connector is installed and authorized for `phoenx-online` with repository access enabled.

Verified state:

- organization installation exists
- repository selection: all repositories

## Gate 2 — Transfer canonical repository

**COMPLETED.** GitHub native transfer moved:

`melvin826/phoenix-enterprise-core`

into:

`phoenx-online/phoenix-enterprise-core`

Transfer continuity evidence:

- GitHub repository numeric ID remained **`1094814392`**.
- default branch remains `main`.
- latest verified pre-PHX-M0.5 `main` commit is `0a39b812aa076c8fe041caf45c76878eabc821a6`.
- six expected branches are visible after transfer.
- PR history #1–#5 is preserved under `phoenx-online`.
- old owner/repository lookup resolves to the transferred repository.
- repository remains public at this stage.

## Gate 2A — Remove obsolete executable deployment path

**IN PROGRESS IN PHX-M0.5.**

The transferred repository still contained `.github/workflows/deploy.yml`, which automatically deployed every `main` push to a DigitalOcean droplet using:

- `runs-on: ubuntu-latest`
- SSH as `root`
- legacy `/var/www/phoenix` path
- legacy Droplet secrets
- permissive `|| true` deployment steps

This workflow is historical and not authorized for the current PHOENIX architecture. PHX-M0.5 physically removes it before further `main` development work.

## Gate 3 — Preserve repository history

**VERIFIED FOR COMMITS / BRANCHES / PRs.**

Verified:

- repository identity continuity via unchanged repository ID
- commit history from the November 2025 initial commit through PHX-M0.4 is visible under the new organization
- expected branches preserved
- PRs #1–#5 preserved
- default branch preserved
- old repository path resolves to the transferred repository

Tag enumeration is not independently exposed by the current connector action set. No tag deletion, rewrite, or destructive cleanup is authorized.

## Gate 4 — Rename repository to canonical name

**CURRENT OWNER/UI GATE.** The connector does not expose repository rename administration.

Rename:

`phoenx-online/phoenix-enterprise-core`

to:

`phoenx-online/phoenix`

Use GitHub repository **Settings → General → Repository name**.

Do not create a second repository. Rename the transferred repository itself so repository ID, history, PRs, branches, redirects, and continuity remain intact.

## Gate 4A — Post-rename verification

After rename is visible to the connector, verify:

- repository owner is `phoenx-online`
- repository name is `phoenix`
- repository ID remains `1094814392`
- default branch is `main`
- branches remain intact
- PR history remains intact
- old personal and pre-rename URLs redirect correctly
- `SOURCE_OF_TRUTH.md` and `docs/decisions/ADR-0001-product-independence.md` exist
- `.github/workflows/deploy.yml` is absent
- no legacy deployment workflow is active
- repository visibility is deliberately accepted or changed through an explicit later decision
- product / brand remains **PHOENIX**
- website/domain remains `phoenx.online`

## Gate 5 — Runtime separation

PHOENIX runtime should use dedicated resources:

- Linux user: `phoenix` when operationally practical
- dedicated project path, e.g. `/srv/phoenix`
- Docker project name: `phoenix`
- PostgreSQL database: dedicated PHOENIX database
- PHOENIX-only environment/secrets
- PHOENIX-only object storage namespace
- PHOENIX-only backup repository/path
- PHOENIX self-hosted GitHub Actions runner

Do not share MBG or iBayong production credentials, containers, volumes, or deployment jobs.

## Gate 6 — Domain activation

Use `phoenx.online` as the primary public domain.

Recommended service mapping:

- `phoenx.online` / `www.phoenx.online` -> public site
- `app.phoenx.online` -> application
- `api.phoenx.online` -> API only when needed
- `admin.phoenx.online` -> admin surface only when separately justified

Before DNS cutover:

- confirm domain registrar ownership/access
- identify DNS provider
- configure TLS through the selected edge/reverse-proxy approach
- verify no existing production service is displaced
- use least-privilege origin exposure
- validate HTTP redirects and canonical host

## Gate 7 — Historical repository retirement

Native transfer means the repository history itself moved; there is no separate recreated canonical repository to delete.

After rename verification:

- ensure old GitHub URLs redirect to `phoenx-online/phoenix`
- update references that should use the new canonical URL
- do not delete or rewrite history solely for cleanup

## Explicit non-goals for PHX-M0

- no production deployment
- no MBG changes
- no iBayong changes
- no Craniumtek production changes
- no DNS cutover until ownership and target runtime are verified
- no activation of legacy Docker/deploy scaffold
