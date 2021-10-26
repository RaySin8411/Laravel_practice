---
title:  API Document

language_tabs:
- bash
- javascript

---
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

# 使用者
## Register

> Example request:

```bash
curl -X POST \
    "http://localhost/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"1234@gmail.com","password":"12345678"}'

```

```javascript
const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "1234@gmail.com",
    "password": "12345678"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "You've registered"
}
```

### HTTP Request
`POST api/user`

#### Body Parameters
Parameter | Type | Status | Description
--- | --- | --- | ---
email | String | required | 電郵
password | String | required | 密碼


## Login

> Example request:

```bash
curl -X POST \
    "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"1234@gmail.com","password":"12345678"}'

```

```javascript
const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "1234@gmail.com",
    "password": "12345678"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "You've logged in"
}
```
> Example response (201):

```json
{
    "message": "Wrong email or password！"
}
```

### HTTP Request
`POST api/login`

#### Body Parameters

Parameter | Type | Status | Description
--- | --- | --- | ---
email | String | required | 電郵
password | String | required | 密碼


## Userinfo

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Welcome 1234@gmail.com",
    "data": {
        "email": "1234@gmail.com",
        "password": "12345678"
    }
}
```
> Example response (201):

```json
{
    "message": "Welcome Admin",
    "data": {
        "total": 2,
        "user": [
            "test@1234.com",
            "test2@222.com"
        ]
    }
}
```

> Example response (401):

```json
{
    "message": "Unauthenticated"
}
```

### HTTP Request
`GET api/user`



## Update User

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"1234@gmail.com","password":"12345678"}'

```

```javascript
const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "1234@gmail.com",
    "password": "12345678"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Member updated successfully!"
}
```
> Example response (201):

```json
{
    "message": "Email or Password doesn't suit data format!"
}
```

> Example response (401):

```json
{
    "message": "Unauthenticated"
}
```

### HTTP Request
`PUT api/user`

#### Body Parameters

Parameter | Type | Status | Description
--- | --- | --- | ---
email | String | required | 電郵
password | String | required | 密碼


## Delete User

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "The user id deleted."
}
```
> Example response (201):

```json
{
    "message": "You have no authority to delete!"
}
```

> Example response (401):

```json
{
    "message": "Unauthenticated"
}
```

### HTTP Request
`DELETE api/user/{users}`

## Logout

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "You've logged out."
}
```

> Example response (401):

```json
{
    "message": "Unauthenticated"
}
```

### HTTP Request
`GET api/logout`
