# System & Architecture Design

## Core Architecture Flow
The platform uses a decoupled architecture utilizing Laravel for the backend REST API and React 19 for the frontend UI.

**Controller -> Service/Action -> Repository/Model -> DTO/Resource**

## Engineering & SDLC Focus

- **Live WebSockets / Broadcasting:** Synchronizing draft picks and turn timers in real time across all league members.
- **Point Calculation Pipelines:** Background queue workers calculating complex scoring formulas (goals, assists, clean sheets, penalties) and recalculating overall league standings.
- **Database Normalization:** Relational mapping of Leagues, Seasons, Teams, Players, MatchPerformances, and DraftPicks.
