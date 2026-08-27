<?php

session_start();

/*
=====================================================
ADMIN LOGIN PROTECTION
=====================================================
*/

if (
    !isset($_SESSION["admin_logged_in"]) ||
    $_SESSION["admin_logged_in"] !== true
) {

    header("Location: admin_login.php");

    exit;
}


/*
=====================================================
DATABASE CONNECTION
=====================================================
*/

include "config.php";


/*
=====================================================
GET LEADS
=====================================================
*/

$sql = "SELECT
            id,
            service,
            requirement,
            name,
            phone,
            email,
            created_at
        FROM leads
        ORDER BY id DESC";


$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>CopyHart Leads</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            padding: 30px;

            font-family: Arial, sans-serif;

            background: #f5f6f8;

            color: #222;

        }


        .container {

            max-width: 1400px;

            margin: auto;

            background: white;

            padding: 25px;

            border-radius: 12px;

            box-shadow:
                0 4px 20px rgba(0,0,0,0.08);

        }


        /* HEADER */

        .top-bar {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 10px;

        }


        h1 {

            margin: 0;

            font-size: 28px;

        }


        .subtitle {

            color: #666;

            margin-bottom: 25px;

        }


        /* LOGOUT BUTTON */

        .logout {

            padding: 10px 18px;

            background: #dc2626;

            color: white;

            text-decoration: none;

            border-radius: 7px;

            font-size: 14px;

            font-weight: bold;

        }


        .logout:hover {

            background: #b91c1c;

        }


        /* LEAD COUNT */

        .count {

            display: inline-block;

            margin-bottom: 20px;

            padding: 8px 14px;

            background: #eef2ff;

            color: #3730a3;

            border-radius: 20px;

            font-size: 13px;

            font-weight: bold;

        }


        /* TABLE */

        .table-container {

            width: 100%;

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 950px;

        }


        th {

            background: #111827;

            color: white;

            padding: 14px;

            text-align: left;

            font-size: 14px;

            white-space: nowrap;

        }


        td {

            padding: 13px;

            border-bottom: 1px solid #e5e7eb;

            font-size: 14px;

            vertical-align: top;

        }


        tr:hover {

            background: #f9fafb;

        }


        .empty {

            text-align: center;

            padding: 40px;

            color: #777;

        }


        /* MOBILE */

        @media (max-width: 700px) {

            body {

                padding: 15px;

            }


            .container {

                padding: 18px;

            }


            .top-bar {

                align-items: flex-start;

                gap: 15px;

            }


            h1 {

                font-size: 22px;

            }

        }

    </style>

</head>


<body>


<div class="container">


    <!-- HEADER -->

    <div class="top-bar">

        <div>

            <h1>
                CopyHart Leads
            </h1>

        </div>


        <a
            href="logout.php"
            class="logout"
        >

            Logout

        </a>

    </div>


    <div class="subtitle">

        Customer enquiries received through the chatbot

    </div>


    <!-- LEAD COUNT -->

    <?php

    if ($result) {

        echo '<div class="count">';

        echo $result->num_rows;

        echo ' Total Leads';

        echo '</div>';

    }

    ?>


    <!-- TABLE -->

    <div class="table-container">


        <table>


            <thead>

                <tr>

                    <th>
                        ID
                    </th>


                    <th>
                        Service
                    </th>


                    <th>
                        Requirement
                    </th>


                    <th>
                        Name
                    </th>


                    <th>
                        Phone
                    </th>


                    <th>
                        Email
                    </th>


                    <th>
                        Date & Time
                    </th>

                </tr>

            </thead>


            <tbody>


            <?php


            if (
                $result &&
                $result->num_rows > 0
            ) {


                while (
                    $row = $result->fetch_assoc()
                ) {


                    echo "<tr>";


                    echo "<td>";

                    echo htmlspecialchars(
                        $row["id"]
                    );

                    echo "</td>";


                    echo "<td>";

                    echo htmlspecialchars(
                        $row["service"]
                    );

                    echo "</td>";


                    echo "<td>";

                    echo htmlspecialchars(
                        $row["requirement"]
                    );

                    echo "</td>";


                    echo "<td>";

                    echo htmlspecialchars(
                        $row["name"]
                    );

                    echo "</td>";


                    echo "<td>";

                    echo htmlspecialchars(
                        $row["phone"]
                    );

                    echo "</td>";


                    echo "<td>";

                    echo htmlspecialchars(
                        $row["email"]
                    );

                    echo "</td>";


                    echo "<td>";

                    echo htmlspecialchars(
                        $row["created_at"]
                    );

                    echo "</td>";


                    echo "</tr>";

                }


            } else {


                echo "

                    <tr>

                        <td
                            colspan='7'
                            class='empty'
                        >

                            No leads found.

                        </td>

                    </tr>

                ";

            }


            ?>


            </tbody>


        </table>


    </div>


</div>


</body>

</html>


<?php

$conn->close();

?>