# PHOENIX Graph Engineering V1

Status: APPROVED FOUNDATION  
Effective: 2026-09-15 PHT

PHOENIX adopts Graph Engineering as the orchestration model for AI-assisted operations. It remains an independent product boundary with its own repository, runtime, data, secrets, CI/CD, observability, and release lifecycle.

The ecosystem standard is maintained in `Craniumtek-Solutions-Inc/cranium-ops` as `architecture/GRAPH_ENGINEERING_STANDARD_V1.md`.

## Current adoption level

**Level 1 — machine-readable graph contracts; no production activation.**

`config/agent_graph.php` defines the initial product graph contracts. These contracts grant no new production authority and do not override `SOURCE_OF_TRUTH.md`, `DEV_RUNTIME_BASELINE.md`, `MIGRATION_PLAN.md`, or `SECURITY_AUDIT.md`.

## V1 graph: Live Selling Operations

The first product graph follows the approved V1 wedge:

`brand/store input -> product/session readiness -> host/creator matching -> content/script assistance -> media/traffic plan -> policy/approval gates -> live-session execution -> order/attribution ingestion -> deterministic commission/cost/revenue ledger -> profitability verification -> terminal`

Rules:

- AI may recommend hosts, scripts, schedules, product bundles, traffic tactics, and optimization actions.
- Inventory, orders, budgets, commissions, settlements, revenue, costs, and attribution ledger writes remain deterministic.
- Material budget changes, settlement exceptions, punitive actions, and irreversible financial decisions require explicit authority and human judgment where appropriate.
- Live-session evidence and attribution inputs must be traceable to source data.

## Foundation graph

Modernization and environment work follows:

`source-of-truth -> inspect legacy scaffold -> architecture/security gate -> deterministic DEV change -> tests -> verification -> human approval for next environment -> terminal`

No graph edge may silently activate production DNS, production credentials, real-money flows, or deployment from `main`.

## Cross-product isolation

PHOENIX may integrate with iBayong, MBG, or Craniumtek only through explicit APIs, events, webhooks, or documented imports/exports. Shared application tables, shared runtime secrets, and direct cross-project database writes are prohibited.

## Runtime binding requirements

Every executable side-effect node must define actor authority, input/output contract, idempotency or deduplication, evidence, bounded retries, independent verification, and compensation/rollback where technically possible.
