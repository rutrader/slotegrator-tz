# Authorized User

## Request

```
GET /favorites?category={category}&sort={sort} HTTP/1.1
Host: api.market.com
Authorization: Bearer 2YotnFZFEjr1zCsicMWpAA
Accept: application/json
```

## Response

```bash
HTTP/1.1 200 OK
Content-Type: application/json;charset=UTF-8

[
	{
		"id": 5,
		"name": "Example product 5",
		"description": "Example product 5 description",
		"image_url": [
			"https://cdn.market.com/images/products/5/1.png",
			"https://cdn.market.com/images/products/5/2.png",
			"https://cdn.market.com/images/products/5/3.png"
		],
		"category": "category-1",
		"is_favorite": true
	},
	...
]
```

# Unauthorized User

## Request

```bash
GET /favorites?category={category}&sort={sort} HTTP/1.1
Host: api.market.com
Accept: application/json
```

## Response

```bash
HTTP/1.1 401 Unauthorized
Content-Type: application/json

{
  "error": "Unauthorized",
  "message": "You must be logged in to perform this action."
}
```