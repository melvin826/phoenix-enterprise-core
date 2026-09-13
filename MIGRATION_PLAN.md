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
- Initial canonical repository name: `phoenix`
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

Verified state at completion:

- organization installation exists
- repository selection: all repositories
- organization currently contains zero repositories

## Gate 2 — Transfer canonical repository

**CURRENT OWNER/UI GATE.** The connector does not expose GitHub repository-transfer or repository-creation administration.

Preferred migration path:

1. Transfer `melvin826/phoenix-enterprise-core` into the `phoenx-online` organization through GitHub repository settings.
2. Preserve all Git history, branches, tags, issues, pull requests, and redirects during transfer.
3. After transfer completes, rename the repository from `phoenix-enterprise-core` to `phoenix`.
4. Do not initialize a separate empty `phoenix` repository before transfer.
5. Do not delete the original repository or history manually; GitHub transfer should preserve continuity and redirects.

Target after this gate:

`phoenx-online/phoenix`

## Gate 3 — Preserve repository history

Historical source repository before transfer:

`melvin826/phoenix-enterprise-core`

Preferred migration method is GitHub native repository transfer. If native transfer proves unsuitable, use a mirror migration only after documenting why transfer cannot be used.

## Gate 4 — Verification

After the transfer is visible to the connector, verify:

- repository owner is `phoenx-online`
- repository name is `phoenix`
- complete commit history preserved
- default branch correct
- branches preserved
- tags preserved
- issues / PR history preserved or deliberately handled
- Actions workflows reviewed before enabling
- repository visibility intentionally selected
- no legacy secrets transferred blindly
- no hard-coded placeholder credentials retained as active configuration
- `SOURCE_OF_TRUTH.md` and `ADR-0001` exist in canonical repo
- organization display name is **PHOENIX**
- organization handle is **`phoenx-online`**
- canonical repository is **`phoenx-online/phoenix`**
- product / brand is **PHOENIX**
- website/domain reference is `phoenx.online`

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

Only after migration verification:

- ensure old GitHub URLs redirect to `phoenx-online/phoenix`
- update references that should use the new canonical URL
- do not delete history solely for cleanup

## Explicit non-goals for PHX-M0

- no production deployment
- no MBG changes
- no iBayong changes
- no Craniumtek production changes
- no DNS cutover until ownership and target runtime are verified
- no activation of legacy Docker/deploy scaffold
