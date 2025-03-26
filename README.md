# Symfony Product API

This is a simple Symfony-based API for retrieving product details.

## Installation and Setup

Follow these steps to set up and run the project:

1. **Clone the Repository**  
   ```sh
   git clone https://github.com/hassaanmuneebalvi/symfony-product-api.git
   ```

2. **Navigate to the Project Directory**  
   ```sh
   cd symfony-product-api
   ```

3. **Install Dependencies**  
   Run the following command to install the necessary dependencies:
   ```sh
   composer install
   ```

4. **Start the Symfony Server**  
   Use the following command to run the project locally:
   ```sh
   symfony serve
   ```

## API Usage

### Get Product by ID

- **Endpoint:** `GET /api/products/{id}`
- **Example Request using CURL:**  
  ```sh
  curl -X GET http://127.0.0.1:8000/api/products/1
  ```
- **Alternatively, open the following URL in your browser to see the response:**  
  [http://127.0.0.1:8000/api/products/1](http://127.0.0.1:8000/api/products/1)

- **Success Response:**  
  ```json
  {
      "id": 1,
      "name": "Laptop",
      "price": 1200.00
  }
  ```

- **Error Response (if product not found):**  
  ```json
  {
      "message": "Product not found"
  }
  ```

## Running Tests

To run the PHPUnit test cases, execute:

```sh
php bin/phpunit
```

This will test the API responses for valid and invalid product requests.

## Notes

- This project uses in-memory product data (no database required).
- Symfony CLI is required to run the `symfony serve` command.
- Ensure `composer` and `PHP` are installed before running the project.

