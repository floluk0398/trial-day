<p align="center"><a href="https://additive.eu" target="_blank"><img src="https://raw.githubusercontent.com/additive-apps/trial-day/master/logo.png" width="400"></a></p>


# 01 REST Design


Your objective is to design a RESTful API for an offer entity and it's room prices.

This includes all relevant endpoints to create, update, read and delete all entities with their requests and responses defined in JSON.

Given the Hotel "Testhotel Post" with it's rooms:

- Double room
- Junior Suite
- King Suite

For every of the above rooms, an offer can define an individual price. An offer consist of 3 properties: `name`, `start_date` and `end_date`.
A room can have multiple prices through multiple offers.

The offer "Easter 2021" from 2021-04-02 to 2021-04-07 for example defines a price of 180 Eur for the "Double room" and 230 Eur for the "Junior suite". 
It does not specify a price for the "King suite".

The offer "Winter 2021" from 2021-11-15 to 2021-11-21 has a price of 150 Eur for the "Double room".

With the REST API It should be possible to:

- retrieve all offers
- retrieve a single offer by an id
- create an offer with a name, start_date and end_date
- update the name, start_date and end_date of an offer
- delete an offer by id
- define and update the price for a room for a specific offer
- list all prices defined for a specific offer
- delete the price for a room in a single offer

Extend this document following the example. Create a pull request at the end to complete your work.

## Example

**Request GET `/offers`**

Payload: This GET has no Payload

**Response**

Payload:

```json
{
	"offers": [
		{
			"id": 1,
			"name": "Easter 2021",
			"start_at": "2021-04-02",
			"end_at": "2021-04-07"
		},
		// ... more offers
	]
}
```




## MY ANSWERS:


- retrieve a single offer by an id
Request GET `/offer`
Params: 
  id:int

Request:
```json
{
	"id": 4
}
```

Response:
```json
{
	"offer": [
		{
			"id": 4,
			"name": "Halloween",
			"start_at": "2021-10-31",
			"end_at": "2021-11-01"
		}
	]
}
```


- create an offer with a name, start_date and end_date
Request POST `/offer/create`
Params:
  name:string
  start_at:unixtime
  end_at:unixtime

Request: 
```json
{
    "request": [
        {
            "name": "Halloween",
            "start_at": 1619856633,
            "end_at": 1619943033
        }
    ]
}
```

Response:
```json
{
    "response": [
        {
            "id": 4
        }
    ]
}
```


- update the name, start_date and end_date of an offer
Request POST `/offer/update`
Params: 
  id:int
  name:string
  start_at:unixtime
  end_at:unixtime

Request: 
```json
{
    "request": [
        {
            "id": 4,
            "name": "Halloween 2021",
            "start_at": 1619856633,
            "end_at": 1619943033
        }
    ]
}
```

Response:
```json
{
    "response": [
        {
            "status": "ok"
        }
    ]
}
```


- delete an offer by id
Request POST `/offer/delete`
Params:
  id:int
  
Request: 
```json
{
    "request": [
        {
            "id": 4
        }
    ]
}
```

Response:
```json
{
    "response": [
        {
            "status": "ok"
        }
    ]
}
```


- define and update the price for a room for a specific offer
Request POST `/price/update`
Params:
  offer_id:int
  room_id:int
  price:decimal
  
Request:
```json
{
    "request": [
        {
            "offer_id": 4,
            "room_id": 1,
            "price": 123.45
        }
    ]
}
```

Response:
```json
{
    "response": [
        {
            "status": "ok"
        }
    ]
}
```


- list all prices defined for a specific offer
Request GET `/price/list`
Params: 
  offer_id

Request:
```json
{
    "request": [
        {
            "offer_id": 4
        }
    ]
}
```

Response:
```json
{
    "response": [
        {
            "offer_id": 4,
            "prices": [
                123.45,
                // ... more prices
            ]
        }
    ]
}
```


- delete the price for a room in a single offer
Request POST `/price/delete`
Params:
  offer_id:int
  room_id:int

Request:
```json
{
    "request": [
        {
            "offer_id": 4,
            "room_id": 1
        }
    ]
}
```

Response:
```json
{
    "response": [
        {
            "status": "ok"
        }
    ]
}
```
