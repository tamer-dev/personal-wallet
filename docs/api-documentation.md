# API Documentation

## Authentication


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
    "authorisation": {
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
    "user_id": "int",
    "amount": "decimal",
    "payment_method": "string"
}
```

**Response**:
```json
{
    "success": true,
    "message": "Funds added successfully",
    "new_balance": "decimal"
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
    "recipient_id": "int",
    "sender_id": "int",
    "amount": "decimal"
}
```

**Response**:
```json
{
    "success": true,
    "message": "Funds transferred successfully",
    "new_balance": "decimal"
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
    "transactions": [
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
    "new_balance": "decimal"
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
