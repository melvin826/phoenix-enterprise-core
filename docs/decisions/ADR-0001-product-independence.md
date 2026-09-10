# ADR-0001 — PHOENX Product Independence Boundary

Status: Accepted

Date: 2026-09-10

## Context

PHOENX has evolved from an earlier Phoenix Creator Team scaffold into a Live Commerce Growth Operating System. Craniumtek Solutions Inc., Morning Breaks Global, and iBayong now have distinct business domains, users, data models, operational risks, and release lifecycles.

Combining these systems into a shared application, database, authentication dependency, or deployment pipeline would create unnecessary coupling and make future commercialization, scaling, security review, incident isolation, and ownership changes harder.

## Decision

PHOENX is an independent Craniumtek-incubated product.

PHOENX SHALL NOT share application databases, business-domain models, runtime secrets, source repositories, storage volumes, or deployment pipelines with:

- Craniumtek corporate systems
- Morning Breaks Global
- iBayong

Cross-product capabilities SHALL use documented APIs, events, webhooks, imports/exports, or approved integration contracts.

Morning Breaks Global and iBayong MAY consume PHOENX as customers, tenants, partners, or integrated systems, but SHALL NOT become PHOENX modules.

Craniumtek Solutions Inc. remains PHOENX's technology / engineering incubator unless superseded by a later corporate decision.

## Consequences

### Positive

- independent release lifecycle
- reduced blast radius
- clear data ownership
- cleaner access control
- safer secrets management
- easier future spin-off, investment, partnership, or sale
- PHOENX can serve MBG/iBayong the same way it serves unrelated external clients
- clearer product positioning and engineering ownership

### Trade-offs

- explicit integration contracts are required
- duplicate infrastructure components may exist across products
- SSO, shared reporting, or shared data products must be designed intentionally rather than assumed

## Guardrails

1. No MBG education-specific tables in PHOENX.
2. No iBayong marketplace-native user or transaction tables in PHOENX except synchronized integration projections with explicit ownership.
3. No Craniumtek corporate credentials reused as PHOENX runtime secrets.
4. No direct cross-product database joins in production.
5. No shared deployment workflow that can deploy PHOENX and another product in the same job.
6. No shared self-hosted runner credentials unless a future security review explicitly approves an isolated runner architecture.
7. Every integration must document data owner, source of truth, authentication method, retry behavior, and failure isolation.

## Naming

Public product identity is **PHOENX** and the primary domain is **phoenx.online**.

Legacy references to “Phoenix” may remain in Git history and historical repository names but new canonical documentation should use PHOENX unless referring to legacy artifacts.
