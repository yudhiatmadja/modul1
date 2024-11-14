<?php
header("Content-Type: application/json");
include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            $query = "SELECT * FROM orders WHERE id = $id";
        } else {
            $query = "SELECT * FROM orders";
        }
        $result = mysqli_query($conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $name = $input['name'];
        $email = $input['email'];
        $service = $input['service'];
        $details = $input['details'];

        $query = "INSERT INTO orders (name, email, service, details) VALUES ('$name', '$email', '$service', '$details')";
        if (mysqli_query($conn, $query)) {
            echo json_encode(["message" => "Order created successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Failed to create order"]);
        }
        break;

    case 'PUT':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            $input = json_decode(file_get_contents('php://input'), true);
            $name = $input['name'];
            $email = $input['email'];
            $service = $input['service'];
            $details = $input['details'];

            $query = "UPDATE orders SET name='$name', email='$email', service='$service', details='$details' WHERE id=$id";
            if (mysqli_query($conn, $query)) {
                echo json_encode(["message" => "Order updated successfully"]);
            } else {
                http_response_code(500);
                echo json_encode(["error" => "Failed to update order"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Invalid ID"]);
        }
        break;

    case 'DELETE':
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if ($id > 0) {
            $query = "DELETE FROM orders WHERE id=$id";
            if (mysqli_query($conn, $query)) {
                echo json_encode(["message" => "Order deleted successfully"]);
            } else {
                http_response_code(500);
                echo json_encode(["error" => "Failed to delete order"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Invalid ID"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
        break;
}

mysqli_close($conn);
?>
