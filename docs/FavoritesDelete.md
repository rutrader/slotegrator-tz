# Authorized User

## Request

```bash
DELETE /favorites/5 HTTP/1.1
Host: api.market.com
Authorization: Bearer 2YotnFZFEjr1zCsicMWpAA
Content-Type: application/json
Accept: application/json

{
    "user_id": "102",
    "product_id": "5"
}
```

## Response

*Возвращаем обновленный список избранных продуктов.*

```bash
HTTP/1.1 200 OK
Content-Type: application/json;charset=UTF-8

[
	{
		"id": 10,
		"name": "Example product 1",
		"description": "Example product 1 description",
		"image_url": [
			"https://cdn.market.com/images/products/10/1.png",
			"https://cdn.market.com/images/products/10/2.png",
			"https://cdn.market.com/images/products/10/3.png"
		],
		"category": "category-1",
		"is_favorite": true
	},
	{
		"id": 11,
		"name": "Example product 4",
		"description": "Example product 4 description",
		"image_url": [
			"https://cdn.market.com/images/products/10/1.png",
			"https://cdn.market.com/images/products/10/2.png",
			"https://cdn.market.com/images/products/10/3.png"
		],
		"category": "category-1",
		"is_favorite": true
	}
]
```