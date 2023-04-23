## Request:

```
GET /products/1/detail HTTP/1.1
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
		"id": 1,
		"name": "Example product 1",
		"description": "Example product 1 description",
		"image_url": [
			"https://cdn.market.com/images/products/1/1.png",
			"https://cdn.market.com/images/products/1/2.png",
			"https://cdn.market.com/images/products/1/3.png"
		],
		"category": "category-1",
		"is_favorite": false
	}
]
```
