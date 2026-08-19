# Database Schema Design

## Entity Relationship Diagram (ERD)

```text
[users] 1───* [leagues]
   │               │
   │               *
   * 1───────* [league_memberships]

[teams]
   │
   * 1───────* [team_players] *───────1 [players] *───────1 [clubs]
   │                                        │
   * 1───────* [gameweek_rosters]           * 1───────* [player_gameweek_stats]
                      │                                        │
                      *────────────────────*───────────────────┘
                                           │
                                     [gameweeks]
```

## Table Definitions & Relational Constraints

### `clubs`
| Column | Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | PRIMARY KEY, AUTO_INCREMENT | Internal identifier |
| name | VARCHAR(100) | NOT NULL, UNIQUE | Club name (e.g., Arsenal, Liverpool) |
| short_code | VARCHAR(3) | NOT NULL, UNIQUE | 3-letter ticker (e.g., ARS, MCI) |
| created_at / updated_at | TIMESTAMP | NULLABLE | Laravel timestamps |

### `players`
| Column | Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | PRIMARY KEY, AUTO_INCREMENT | Internal identifier |
| club_id | BIGINT UNSIGNED | NOT NULL, FOREIGN KEY (clubs.id) ON DELETE CASCADE | Current real-world club |
| first_name | VARCHAR(100) | NOT NULL | First name |
| last_name | VARCHAR(100) | NOT NULL, INDEX | Last name |
| position | ENUM('GK', 'DEF', 'MID', 'FWD') | NOT NULL, INDEX | Tactical position |
| cost_cents | INT UNSIGNED | NOT NULL | Price (e.g., 1250 for £12.5M) |
| is_active | BOOLEAN | NOT NULL, DEFAULT TRUE | Active availability |

### `gameweeks`
| Column | Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | PRIMARY KEY, AUTO_INCREMENT | Internal identifier |
| number | SMALLINT UNSIGNED | NOT NULL, UNIQUE | Gameweek 1 through 38 |
| deadline_at | TIMESTAMP | NOT NULL, INDEX | Lineup lock timestamp |
| is_processed | BOOLEAN | NOT NULL, DEFAULT FALSE | Point calculation state |

### `teams` (User Fantasy Teams)
| Column | Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | PRIMARY KEY, AUTO_INCREMENT | Internal identifier |
| user_id | BIGINT UNSIGNED | NOT NULL, FOREIGN KEY (users.id) ON DELETE CASCADE | Team owner |
| name | VARCHAR(100) | NOT NULL | Team name |
| budget_remaining_cents | INT UNSIGNED | NOT NULL, DEFAULT 10000 | Unspent budget |

### `team_players` (Roster Pivot)
| Column | Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | PRIMARY KEY, AUTO_INCREMENT | Internal identifier |
| team_id | BIGINT UNSIGNED | NOT NULL, FOREIGN KEY (teams.id) ON DELETE CASCADE | Linked fantasy team |
| player_id | BIGINT UNSIGNED | NOT NULL, FOREIGN KEY (players.id) ON DELETE CASCADE | Linked EPL player |
| purchase_cost_cents | INT UNSIGNED | NOT NULL | Purchase price lock |

*Unique Index: (team_id, player_id) - Prevents duplicate player additions*

### `player_gameweek_stats` (Raw Performance Data)
| Column | Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | PRIMARY KEY, AUTO_INCREMENT | Internal identifier |
| player_id | BIGINT UNSIGNED | NOT NULL, FOREIGN KEY (players.id) ON DELETE CASCADE | Linked player |
| gameweek_id | BIGINT UNSIGNED | NOT NULL, FOREIGN KEY (gameweeks.id) ON DELETE CASCADE | Linked gameweek |
| minutes_played | SMALLINT UNSIGNED | NOT NULL, DEFAULT 0 | Match minutes |
| goals | TINYINT UNSIGNED | NOT NULL, DEFAULT 0 | Goals scored |
| assists | TINYINT UNSIGNED | NOT NULL, DEFAULT 0 | Assists provided |
| clean_sheet | BOOLEAN | NOT NULL, DEFAULT FALSE | Clean sheet earned |
| total_points | SMALLINT | NOT NULL, DEFAULT 0 | Calculated points |

*Unique Index: (player_id, gameweek_id) - Prevents duplicate stat records*
