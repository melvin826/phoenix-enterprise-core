# PHOENX — Source-of-Truth Recovery

> This repository began as the November 2025 `phoenix-enterprise-core` scaffold. The product has since evolved into **PHOENX — the Live Commerce Growth Operating System**.

Primary domain: **phoenx.online**

GitHub organization display name: **PHOENIX**

Technology / engineering incubator: **Craniumtek Solutions Inc.**

## Current authority

Read these before using any legacy scaffold or deployment file:

- `SOURCE_OF_TRUTH.md`
- `docs/decisions/ADR-0001-product-independence.md`
- `MIGRATION_PLAN.md`

The historical Docker, Nginx, MariaDB/MySQL, CI/CD, and Droplet deployment files in this repository are **not automatically approved for current PHOENX runtime use**. They require explicit revalidation against the current source of truth.

## Product boundary

PHOENX is operationally separate from:

- Craniumtek corporate systems
- Morning Breaks Global
- iBayong

Integrations with those products must use explicit APIs/events/contracts rather than shared databases, secrets, repositories, or deployment pipelines.

## Migration target

The intended end state is a dedicated **PHOENIX GitHub organization** with a canonical PHOENX repository while preserving the full history of this legacy repository.

The organization display name and product domain are intentionally distinct values:

- GitHub organization display name: **PHOENIX**
- Product domain: **phoenx.online**

No production deployment is authorized by this documentation change.
