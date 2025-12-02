<?php
function get_user_by_email($email, $conn)
{
    $curr = $conn->prepare("SELECT id FROM users WHERE email = ?;");
    $curr->bind_param("s", $email);
    $curr->execute();

    $results = $curr->get_result();
    $row = $results->fetch_assoc();
    var_dump($row);
    if ($row) {
        return [true, $row['id']];
    }

    return [false, null];
}
function create_user($email, $conn)
{
    $curr = $conn->prepare("INSERT INTO users (email) VALUES (?)");
    if (!$curr) {
        return [false, "Prepare failed: " . $conn->error];
    }

    $curr->bind_param("s", $email);

    // Execute
    if (!$curr->execute()) {
        return [false, "Execute failed: " . $curr->error];
    }

    // Capture the inserted ID
    $new_id = $curr->insert_id;

    return [true, $new_id];
}

function create_order($conn, $user_id, $addr)
{
    $curr = $conn->prepare("INSERT INTO orders(user_id, shipping_address) VALUES(? , ?)");
    if (!$curr) {
        return [false, "Prepare failed: " . $conn->error];
    }

    $curr->bind_param("ss", $user_id, $addr);

    // Execute
    if (!$curr->execute()) {
        return [false, "Execute failed: " . $curr->error];
    }

    // Capture the inserted ID
    $new_id = $curr->insert_id;

    return [true, $new_id];
}
