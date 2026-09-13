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

The GitHub organization account handle / URL slug is a separate value and SHALL be selected based on availability at organization creation time. Prefer `phoenix` when available; if it is unavailable, an available handle such as `phoenx` may be used while keeping the organization display name **PHOENIX**.

Initial canonical repository should stay simple, preferably a single modular-monolith repository named:

- `phoenix`

Canonical repository path will therefore be `<github-org-handle>/phoenix`.

Additional repositories should be created only when a concrete ownership, release, security, or lifecycle boundary justifies them.

## Migration rule

The historical `melvin826/phoenix-enterprise-core` repository SHALL be preserved until a verified migration transfers all required Git history and source-of-truth content into the new **PHOENIX** GitHub organization repository.

No production deployment is authorized by this source-of-truth update alone.
