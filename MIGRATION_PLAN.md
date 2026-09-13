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

**CURRENT BLOCKER.** The connected GitHub app is not yet installed/authorized for the `phoenx-online` organization.

Before automated migration, install/authorize the GitHub integration for this organization and grant access to the repository that will become canonical. Do not grant access to unrelated repositories unless needed.

## Gate 2 — Canonical repository

Preferred target is a private repository named `phoenix` inside the **PHOENIX** organization unless public-source publication is explicitly intended.

Do not initialize an unrelated scaffold if the historical repository will be transferred or mirror-migrated into it.

## Gate 3 — Preserve repository history

Historical source repository:

`melvin826/phoenix-enterprise-core`

Preferred migration methods, in order:

1. GitHub repository transfer from the personal account into `phoenx-online`, followed by repository rename to `phoenix`, if transfer permissions and visibility are appropriate.
2. If transfer is unsuitable, mirror-push all refs/tags to `phoenx-online/phoenix` and verify commit/tag parity before declaring the old repository historical.

Never delete the old repository until the migration gate is fully verified.

## Gate 4 — Verification

Verify:

- complete commit history preserved
- default branch correct
- tags preserved
- open issues / PRs handled deliberately
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

- update old repository README to point to `phoenx-online/phoenix`
- optionally archive the old repository if it remains separate
- never delete it solely for cleanup unless history and references are conclusively preserved

## Explicit non-goals for PHX-M0

- no production deployment
- no MBG changes
- no iBayong changes
- no Craniumtek production changes
- no DNS cutover until ownership and target runtime are verified
- no activation of legacy Docker/deploy scaffold
