# Symfony Product API

This is a simple Symfony-based API for retrieving product details.

## Installation and Setup

Follow these steps to set up and run the project:

1. **Unzip the Project**  
   Extract the project folder from the provided ZIP file.

2. **Navigate to the Project Directory**  
   ```sh
   cd your_project_folder
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
- **Example Request:**  
  ```sh
  curl -X GET http://127.0.0.1:8000/api/products/1
  ```
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
      "error": "Product not found"
  }
  ```

## Running Tests

To run the PHPUnit test cases, execute:

```sh
php bin/phpunit
```

This will test the API responses for valid and invalid product requests.

## Folder Placement

- Place the controller file inside `src/Controller/ProductController.php`.
- Place the test file inside `tests/Controller/ProductControllerTest.php`.
- Ensure `config/routes/annotations.yaml` is set up correctly.

## Notes

- This project uses in-memory product data (no database required).
- Symfony CLI is required to run the `symfony serve` command.
- Ensure `composer` and `PHP` are installed before running the project.

