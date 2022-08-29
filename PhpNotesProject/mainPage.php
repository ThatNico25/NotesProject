<?php
    session_start();
    $host="127.0.0.1";
    $user="root";
    $password="";
    $db="projectnotesphp";

    $maindb = mysqli_connect($host, $user, $password);

    $dom = new DOMDocument('1.0', 'iso-8859-1');
    $dom->validateOnParse = true;

    mysqli_select_db($maindb, $db);

    if(isset($_POST['submit'])) {
        header("Location: index.php");
        session_unset();
        session_destroy();
    }

    if(isset($_POST['add_btn'])) {
        $author = $_SESSION["Username"];
        $title = $_POST['Title_Note'];
        $description = $_POST['Description_Note'];

        $sqlRequest = "SELECT * FROM notes WHERE Title = '". $title ."' AND Description = '".$description ."' AND Author = '".$author."';";
        $result = mysqli_query($maindb, $sqlRequest); 
        $numRow = mysqli_num_rows($result);

        if ($numRow == 0) {
            $sql = "INSERT INTO notes (`Title`, `Description`, `Author`) VALUES ('". $title ."', '". $description ."', '".$author."');";
            $result = mysqli_query($maindb, $sql);    
        }
    }

    $sqlRequest = "SELECT ID FROM notes ORDER BY ID DESC LIMIT 1;";
    $result = mysqli_query($maindb, $sqlRequest); 
    $num = -1;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $num = $row["ID"];
        } 
    }

    for ($i = 1; $i <= $num; $i++) {
        if(isset($_POST["removeNote".$i])) {
            $sql = "DELETE FROM notes WHERE ID=".$i.";";
            $result = mysqli_query($maindb, $sql); 
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Notes Taker </title>
        <link rel="icon" href="background.png">
        <link rel="stylesheet" href="mainPage.css">
        <script src="script.js"></script>
    </head>
    <body>
        <div id="MenuBar">
            <h1 class="welcomeMessage"><?php echo "Welcome ".$_SESSION["Username"]."!" ?></h1>
            <form class="disconnectForm" method="post"  action="<?php echo $_SERVER["PHP_SELF"];  ?>">
                <input class="disconnectBtn" type="submit" name="submit" id="btn_disconnect" value="Disconnect!" class="btn-logOff"/>
            </form>
        </div>
        <div id="Notes">
            <form class="noteForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div id="list_note">
                    <p name="titleNote" id="Notes_00"class="ListNoteTitle"> List of Notes </p>
                    <?php
                        $sql = "SELECT * FROM notes WHERE Author='".$_SESSION["Username"]."'";
                        $result = mysqli_query($maindb, $sql); 

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                
                                $titleNote = $row["Title"];
                                if (strlen($titleNote) > 20){
                                    $titleNote  = substr($titleNote, 0, 17) . '...';
                                }

                                $descriptionNote = $row["Description"];
                                if (strlen($descriptionNote) > 20){
                                    $descriptionNote = substr($descriptionNote, 0, 17) . '...';
                                }

                                echo "<input type=\"submit\" id=\"Note_".$row["ID"]."\" name=\"NoteID_".$row["ID"]."\" class=\"note\" value=\"".$titleNote. " \n _______________ \n" .$descriptionNote."\"></input>".
                                "<input class=\"x_btn\" type=\"submit\" value=\"X\" name=\"removeNote".$row["ID"]."\" type=\"button\"></input>";
                            }
                        } else {
                            echo "0 results : There is no notes added yet!";
                        }
                    ?>
                </div>
            </form>
            <form class="noteForm inputForm" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <h1 class="titleNoteText"> Notes </h1>
                <div class="form_input">
                    <input type="text" name="Title_Note" id="user" placeholder="Title" class="titleNote" required/>
                </div>
                <div class="form_input">
                    <textarea type="text" name="Description_Note" id="pass" class="desc" placeholder="Description"></textarea>
                </div>
                <input type="submit" name="add_btn" value="ADD" class="btn-add" onclick="addNote()"/>
                <input type="submit" name="update_btn" value="Update" class="btn-update" onclick="updateNote()" disabled/>
            </form>
        </div>
    </body>
</html>

<?php
    $IdNote = -1;

    if(!isset($_SESSION["IDNOTE"])) {
        $_SESSION["IDNOTE"] = -1;
    }

    for ($i = 1; $i <= $num; $i++) {
        if(isset($_POST["NoteID_".$i])) {
            $sql = "SELECT * FROM notes WHERE ID='".$i."'";
            $result = mysqli_query($maindb, $sql); 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $desc = $row["Description"];
                    $desc = preg_replace("/[\r\n]*/","}~#-n237fls93&{}~#-&{",$desc);
                    
                    echo "<script>selectNote(".$i.",\"".$row["Title"]."\",\"".$desc."\");</script>";
                }
            }

            $IdNote = $i;    
            $_SESSION["IDNOTE"] = $i;   
            break; 
        }
    }

    if(isset($_POST['update_btn'])) {
        $sql = "SELECT 'ID' FROM notes WHERE ID='".$i."'";
        $result = mysqli_query($maindb, $sql); 

        $author = $_SESSION["Username"];
        $title = $_POST['Title_Note'];
        $description = $_POST['Description_Note'];

        $sql = "UPDATE notes SET Title='".$title."', Description='".$description."' WHERE ID =".$_SESSION["IDNOTE"].";";
        $result = mysqli_query($maindb, $sql); 

        $IdNote = -1;
        $_SESSION["IDNOTE"] = -1;

        header("Refresh:0");
    }
?>