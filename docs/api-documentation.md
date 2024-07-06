# API Documentation

## Authentication

### Register

**Endpoint**: `POST /api/register`

**Request Body**:
```json
{
    "name": "string",
    "email": "string",
    "password": "string",
    "password_confirmation": "string"
}
```

**Response**:
```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "token": "string"
    }
}
```

### Login

**Endpoint**: `POST /api/login`

**Request Body**:
```json
{
    "email": "string",
    "password": "string"
}
```

**Response**:
```json
{
    "success": true,
    "message": "User logged in successfully",
    "data": {
        "token": "string"
    }
}
```

## Wallet

### Add Funds

**Endpoint**: `POST /api/wallet/add-funds`

**Headers**:
```http
Authorization: Bearer {token}
```

**Request Body**:
```json
{
    "amount": "number"
}
```

**Response**:
```json
{
    "success": true,
    "message": "Funds added successfully",
    "data": {
        "balance": "number"
    }
}
```

### Transfer Funds

**Endpoint**: `POST /api/wallet/transfer-funds`

**Headers**:
```http
Authorization: Bearer {token}
```

**Request Body**:
```json
{
    "recipient_id": "number",
    "amount": "number"
}
```

**Response**:
```json
{
    "success": true,
    "message": "Funds transferred successfully"
}
```

### View Transaction History

**Endpoint**: `GET /api/wallet/transactions`

**Headers**:
```http
Authorization: Bearer {token}
```

**Response**:
```json
{
    "success": true,
    "data": [
        {
            "id": "number",
            "type": "string",
            "amount": "number",
            "created_at": "datetime"
        }
    ]
}
```

### Withdraw Funds

**Endpoint**: `POST /api/wallet/withdraw-funds`

**Headers**:
```http
Authorization: Bearer {token}
```

**Request Body**:
```json
{
    "amount": "number"
}
```

**Response**:
```json
{
    "success": true,
    "message": "Funds withdrawn successfully",
    "data": {
        "balance": "number"
    }
}
```

### Generate PDF of Transactions

**Endpoint**: `GET /api/wallet/transactions/pdf`

**Headers**:
```http
Authorization: Bearer {token}
```

**Response**:
The response will be a PDF file containing the user's transaction history.

### Generate QR Code for Transfer

**Endpoint**: `GET /api/wallet/transfer/qr-code`

**Headers**:
```http
Authorization: Bearer {token}
```

**Response**:
The response will be a QR code image that can be used for easy transfers.
