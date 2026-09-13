# PHOENIX Source of Truth

Status: APPROVED BASELINE — PHX-M0

## Product identity

- Product name: **PHOENIX**
- Primary domain: **phoenx.online**
- Category: **Live Commerce Growth Operating System**
- Positioning: One system for stores, creators, content, media buying, live selling, attribution, finance, and profitable growth.
- Technology / engineering incubator: **Craniumtek Solutions Inc.**

PHOENIX is a separate product boundary. It is not a module of Craniumtek corporate systems, Morning Breaks Global, or iBayong.

## Separation policy

PHOENIX SHALL have independent:

- GitHub organization and canonical repository
- application source tree
- database
- authentication and authorization boundary
- runtime secrets
- storage volumes / object storage
- Docker project / containers
- CI/CD pipeline and self-hosted runner
- logging and observability boundary
- backups and restore procedures
- deployment lifecycle

Cross-product interaction with Craniumtek, Morning Breaks Global, and iBayong SHALL use explicit APIs, events, webhooks, imports/exports, or other documented integration contracts. Shared application tables or shared runtime secrets are prohibited.

## Relationship to other products

### Craniumtek Solutions Inc.
Craniumtek is PHOENIX's technology / engineering incubator and may own, build, operate, support, or commercialize PHOENIX. PHOENIX remains product-operationally independent.

### Morning Breaks Global
MBG is an external client/integration from PHOENIX's perspective. MBG-specific teachers, students, classes, packages, and education workflows SHALL NOT become PHOENIX domain models.

### iBayong
iBayong is an external marketplace/integration from PHOENIX's perspective. iBayong buyer, seller, marketplace listing, and marketplace transaction records SHALL remain in iBayong. PHOENIX may consume approved commerce data through integration contracts.

## Six product pillars

1. **Store & Marketplace Growth** — products, catalogs, listings, inventory, offers, orders, marketplace operations and growth.
2. **Creator, Affiliate & Talent Network** — creators, live sellers, affiliates, recruitment, product matching, commissions and performance.
3. **Content & Creative Production** — briefs, scripts, UGC, video, assets, approvals, publishing and creative performance.
4. **Performance Marketing, Paid Ads & Media Buying** — media plans, budgets, bidding, amplification, pacing, optimization, attribution, ROAS, CAC, CPO and GMV.
5. **Live Selling Operations** — hosts, schedules, products, scripts, studio operations, live sessions, traffic amplification, QA and conversion.
6. **Commerce Intelligence, Finance & Attribution** — revenue, costs, commissions, settlements, attribution, profitability, forecasting and executive reporting.

## V1 wedge

The deepest V1 capability is **Live Selling Operations**, connected to creators, content, media buying, products/orders, and an attribution ledger. PHOENIX should not attempt to become a general ERP or consumer marketplace in V1.

## Canonical shared PHOENIX entities

- organizations
- brands
- stores
- marketplaces
- products
- catalogs
- inventory
- creators
- affiliates
- hosts
- campaigns
- content_assets
- live_sessions
- media_plans
- ad_campaigns
- media_budget_ledger
- orders
- attributions
- commissions
- settlements
- costs
- revenue

## Architecture baseline

Target application architecture:

- Laravel modular monolith
- PostgreSQL authoritative database
- Redis for cache / queues / locks where justified
- browser-responsive operations interface / PWA first
- object storage for media/evidence
- Docker-isolated environments
- self-hosted GitHub Actions for controlled CI/CD
- separate DEV, staging, and production runtime boundaries

The existing November 2025 repository scaffold is historical and is NOT automatically authoritative for runtime architecture. Legacy assumptions such as MariaDB 10.6, placeholder passwords, direct public DEV binds, and old Droplet auto-deploy instructions require explicit revalidation before reuse.

## Domain baseline

Primary product/domain identity:

- `phoenx.online` — public product domain
- `www.phoenx.online` — public marketing site if required
- `app.phoenx.online` — application
- `api.phoenx.online` — API when required
- `admin.phoenx.online` — platform administration when separation is justified

The intentional spelling difference is authoritative: the **product/brand is PHOENIX**, while the **domain is phoenx.online**.

Subdomains SHALL only be activated when the corresponding service exists and is independently secured.

## GitHub target

Canonical GitHub organization display name: **PHOENIX**.

Canonical GitHub organization account handle / URL slug: **`phoenx-online`**.

Canonical organization URL: **`https://github.com/phoenx-online`**.

The GitHub app/connector is installed and authorized for the `phoenx-online` organization.

Current transferred repository:

- **`phoenx-online/phoenix-enterprise-core`**

Canonical repository target after rename:

- **`phoenx-online/phoenix`**

Additional repositories should be created only when a concrete ownership, release, security, or lifecycle boundary justifies them.

## Transfer verification

Native GitHub repository transfer from `melvin826/phoenix-enterprise-core` to `phoenx-online/phoenix-enterprise-core` is complete.

Verified after transfer:

- GitHub repository numeric ID remained **`1094814392`**, confirming repository continuity rather than recreation.
- repository owner is **`phoenx-online`**.
- repository name is currently **`phoenix-enterprise-core`** pending the final rename.
- default branch remains **`main`**.
- latest verified `main` commit before the PHX-M0.5 safety branch is **`0a39b812aa076c8fe041caf45c76878eabc821a6`**.
- branches visible after transfer: `main`, `phx-m0-1-org-name-phoenix`, `phx-m0-2-brand-phoenix`, `phx-m0-3-lock-org-handle`, `phx-m0-4-integration-connected`, `phx-m0-source-of-truth-separation-v1`.
- pull requests **#1 through #5** are preserved under the new organization.
- the old `melvin826/phoenix-enterprise-core` path resolves to the transferred repository.
- current repository visibility is **public** and requires deliberate review before any visibility change.
- tag enumeration was not independently available through the current connector action set; no destructive tag operation is authorized.

## Legacy execution safety

The transferred repository contained `.github/workflows/deploy.yml`, a historical workflow that auto-deployed every push to `main` to a DigitalOcean droplet as `root` using `ubuntu-latest` and legacy `/var/www/phoenix` assumptions.

That workflow is obsolete and is being physically removed in PHX-M0.5 before further `main` development work. No legacy production deployment is authorized.

## Migration rule

The ownership transfer is complete. The next owner/UI gate is to rename `phoenx-online/phoenix-enterprise-core` to **`phoenx-online/phoenix`**.

After rename, verify repository redirects, branch/PR continuity, source-of-truth files, workflow safety, and canonical references before beginning independent PHOENIX DEV runtime work.

No production deployment is authorized by this source-of-truth update alone.
