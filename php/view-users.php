<?php
@include 'dbconfig.php';
                $selectQuery = "SELECT id, name, email, img_url FROM user WHERE user_type='Normal'";
                $result = $conn->query($selectQuery);
                if($result && $result->num_rows == 0) {
                    echo '<p>No Users Added yet</p>';
                    echo '<img src="../images/noUsers.png" alt="No Users Added yet">';
                }
                else {
                    echo '<table class="table table-bordered table-hover">';
                    echo '<thead class="thead-dark">';
                    echo '<tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile Photo</th>
                        </tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td style='padding: 15px 20px;'>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td style='position: relative;'><img src='../uploads/{$row['img_url']}'
                            alt='Profile Photo' 
                            style='width:50px; height:50px; border-radius:50%; position:absolute; top:2%; left:45%'></td>
                            </tr>";
                    }
                    echo '</tbody>';
                    echo '</table>';
                }
                ?>