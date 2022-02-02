
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tube Feeding - <?php echo $title ?></title>

        <!-- Bootstrap  CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">      
         
        <!-- Custom CSS -->     
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        
        <!-- Anchor link that call javascrpt function --> 
        <script type="text/javascript">
        function delete_id(id)
        {
             if(confirm('Sure To Remove This Record ?'))
             {
                window.location.href='remove.php?delete_id='+id;
             }
        }
        </script>

    </head>
    
     

        
