# SDLC Blueprint

To make this project work, enforce a strict process before writing any code:

**[Requirement & Scope] ➔ [System & DB Design] ➔ [API Contract] ➔ [TDD/Implementation] ➔ [CI/CD & Deploy]**

## Phase 1: Requirements & Scope (Specification)
- **Goal:** Understand what we are building and what we are *not* building.
- Write a one-page Product Requirement Document (PRD).
- List exact User Stories (e.g., "As an Admin, I can revoke member access so that they immediately lose token validity").
- Define the **Out of Scope** list to prevent scope creep.
- **Documentation:** Update `docs/01-requirements.md`

## Phase 2: System & Architecture Design
- **Goal:** Map out data and application architecture.
- **Entity Relationship Diagram (ERD):** Map tables, foreign keys, indexes, and constraints before touching migration files.
- **Architecture Flow:** Decide service layers (e.g., Controller -> Service/Action -> Repository/Model -> DTO/Resource).
- **Documentation:** Update `docs/02-architecture.md` and `docs/03-database-schema.md`

## Phase 3: Contract-First API Definition
- **Goal:** Define how the frontend and backend will communicate.
- Define request/response schemas using an OpenAPI/Swagger spec or structured Postman collection.
- Define clear HTTP status codes, validation rules, and error payload structures (e.g., `{ "error": "...", "code": 422 }`).
- **Documentation:** Update `docs/04-api-specifications.md`

## Phase 4: Implementation with Testing (TDD / Test-Covered)
- **Goal:** Build the feature with reliability built-in.
- **Unit Tests:** Business logic helpers and utility functions.
- **Feature / Integration Tests:** Test endpoints from request to database response (e.g., test unauthorized access, validation failures, successful record creation).
- **Rule:** No new feature endpoint is merged until a corresponding integration test passes.
- **Documentation:** Update `docs/10-testing.md` and `docs/08-implementation-phases.md`

## Phase 5: CI/CD & Deployment
- **Goal:** Automate delivery and ensure quality.
- Set up a GitHub Actions workflow that runs linting, formatting checks, and your test suite on every pull request.
- Deploy the service to a live staging environment (e.g., Docker container on a VPS, Render, or Railway) with environment variable isolation.
- **Documentation:** Update `docs/15-deployment-guide.md` and `docs/11-environment-config.md`

## Documentation Structure
The agent must keep the `docs/` folder organized and up-to-date according to the following tier system:

**Tier 1: Getting Started**
- `00-getting-started.md` (Main entry point - How to navigate docs, learning path)
- `README.md` (Quick index of all documents)

**Tier 2: Core Documentation**
- `01-requirements.md` (User requirements, acceptance criteria)
- `02-architecture.md` (System architecture, data flows)
- `03-database-schema.md` (Prisma schema, migrations)
- `04-api-specifications.md` (Complete API endpoints)
- `05-components.md` (React component specs)
- `06-permissions.md` (RBAC system)
- `07-navigation.md` (Menu structure)
- `08-implementation-phases.md` (Phase-by-phase guide)
- `09-file-changes.md` (File reference)
- `10-testing.md` (Testing checklist)

**Tier 3: Operational Documentation**
- `11-environment-config.md` (Environment variables, deployment config)
- `12-data-seeding.md` (Initial data, sample scripts)
- `13-ui-design-system.md` (Colors, typography, Tailwind)
- `14-error-handling.md` (Error codes, boundaries)
- `15-deployment-guide.md` (Deployment, rollback)
- `16-glossary.md` (Malay terms, business definitions)
- `17-integration-guide.md` (Integration with existing system)
- `18-hooks-utilities.md` (Custom hooks, utilities)
- `19-security-guidelines.md` (Security practices)
- `20-accessibility.md` (WCAG, keyboard nav, a11y)
