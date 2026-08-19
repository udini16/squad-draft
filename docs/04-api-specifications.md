# Contract-First API Definition

## Authentication
Bearer Token via Laravel Sanctum

- `POST /api/v1/auth/register`
- `POST /api/v1/auth/login`
- `GET  /api/v1/auth/me`

## Squad & Player Endpoints

### `GET /api/v1/players`
**Query Params:** `?position=MID&club_id=1&max_cost=1000&sort=total_points&page=1`

**Response Envelope (200 OK):**
```json
{
  "data": [
    {
      "id": 101,
      "name": "Bukayo Saka",
      "club": { "id": 1, "name": "Arsenal", "short_code": "ARS" },
      "position": "MID",
      "cost": 10.0,
      "cost_cents": 1000,
      "total_points": 84
    }
  ],
  "meta": { "current_page": 1, "per_page": 20, "total": 150 }
}
```

### `POST /api/v1/teams/{teamId}/roster`
**Payload Validation:** Validates that total cost <= 10000, club count <= 3, and squad size equals 15.

**JSON Payload:**
```json
{
  "player_ids": [101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115]
}
```

**Error Response (422 Unprocessable Entity):**
```json
{
  "message": "Validation failed.",
  "errors": {
    "squad": ["Total squad cost of £102.5M exceeds the £100.0M limit."]
  }
}
```
