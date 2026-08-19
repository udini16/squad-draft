# Product Requirements Document (PRD)

## 1.1 Objective & System Scope
SquadDraft is a decoupled fantasy sports platform. Users create private leagues, draft 11-player squads from real English Premier League (EPL) clubs within a fixed budget cap (£100.0M), and compete on weekly Gameweek leaderboards updated by match-event processing jobs.

## 1.2 Core Business Rules & Constraints
- **Budget Cap:** Max budget of £100.0M per team. Player values are stored as integers in cents/pence (e.g., £12.5M -> 1250) to avoid floating-point math errors.
- **Roster Composition:** Exact formation constraints (1 GK, 3–5 DEF, 3–5 MID, 1–3 FWD, summing to exactly 11 active starters + 4 bench substitutes).
- **Club Quota:** Maximum of 3 players from the same Premier League club per user team.
- **Gameweek Lockouts:** Team lineups lock 60 minutes prior to the first match kickoff of a given Gameweek. Mutations attempted after the deadline return HTTP 422 Unprocessable Entity.

## 1.3 Scoring Engine Rules
- **Goal:** FWD (+4 pts), MID (+5 pts), DEF/GK (+6 pts)
- **Assist:** +3 pts
- **Clean Sheet:** DEF/GK (+4 pts), MID (+1 pt)
- **Yellow Card:** -1 pt
- **Red Card:** -3 pts
- **Own Goal:** -2 pts

## 1.4 Out of Scope
- Head-to-Head leagues (Phase 1 focuses on overall leaderboard only).
- Player transfers mid-gameweek (Lineup lock strictly enforced).
