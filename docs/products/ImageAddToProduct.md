## Request

```bash
POST /products/6/images HTTP/1.1
Host: api.market.com
Authorization: Bearer 2YotnFZFEjr1zCsicMWpAA
Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW

------WebKitFormBoundary7MA4YWxkTrZu0gW
Content-Disposition: form-data; name="image"; filename="product-image.jpg"
Content-Type: image/jpeg

[Binary image data here]
------WebKitFormBoundary7MA4YWxkTrZu0gW--

```

## Response

```bash
HTTP/1.1 200 OK
Content-Type: application/json;charset=UTF-8

[
	{
		"id": 5,
		"name": "Example product 6",
		"description": "Example product 6 description",
		"image_url": [
			"https://cdn.market.com/images/products/6/1.png",
			"https://cdn.market.com/images/products/6/2.png",
			"https://cdn.market.com/images/products/6/3.png"
		],
		"category": "category-1",
		"is_favorite": true
	},
	...
]
```