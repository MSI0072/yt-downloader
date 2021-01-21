<?php
//ambil data json dari file
if (isset($_GET['type']))
{
    $getdata = $_GET['type'];
    if ($getdata == 'ytmp4' || $getdata == 'fb' || $getdata == 'twitter')
    {
        if (isset($_GET['link']))
        {
            $link = $_GET['link'];

            $gabunglink = "https://arugbot.herokuapp.com//api/info?url={$link}";

            # ambil data json dari $alamatAPI
            $data = file_get_contents($gabunglink);

            # parsing variabel $data ke dalam array
            $downloader = json_decode($data);

            $title = $downloader
                ->info->title;
            $thumbnail = $downloader
                ->info->thumbnail;
            $url = $downloader
                ->info->url;

            echo $title;
        }
    }
    else if ($getdata == 'tiktok')
    {
        if (isset($_GET['link']))
        {
            $link = $_GET['link'];

            $gabunglink = "https://arugaz.my.id/api/media/tiktok?url={$link}";

            # ambil data json dari $alamatAPI
            $data = file_get_contents($gabunglink);

            # parsing variabel $data ke dalam array
            $downloader = json_decode($data);

            $title = $downloader
                ->result->textInfo;
            $thumbnail = $downloader
                ->result->image;
            $url = $downloader
                ->result->mp4direct;

            echo $title;

        }
    }
    else if ($getdata == 'ytmp3')
    {
        if (isset($_GET['link']))
        {
            $link = $_GET['link'];

            $gabunglink = "https://arugaz.my.id/api/media/ytmus?url={$link}";

            # ambil data json dari $alamatAPI
            $data = file_get_contents($gabunglink);

            # parsing variabel $data ke dalam array
            $downloader = json_decode($data);

            $title = $downloader
                ->titleInfo;
            $thumbnail = $downloader
                ->getImages;
            $url = $downloader
                ->getAudio;

            echo $title;

        }
    }
    else
    {
        echo 'error woy';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Postingan</title>
</head>
<style>
    body
    {
        font-family: Arial, Helvetica, sans-serif;
        background-color: black;
    }
 
    div
    {
        background-color: white;
        width: 55%;
        margin: auto;/*supaya ke tengah*/
        padding: 10px;
        margin-bottom: 10px;
    }
 
    div h2
    {
        color: darkorange;
    }
 
    div img
    {
        width: 100%;
        height: 400px;
    }
 
    a
    {
        text-decoration: none;
        background-color: crimson;
        color: white;
        padding: 8px;
        display: block;/*menjadikan elemen tipe blok*/
        width: 120px;
        text-align: center;
        border-radius: 8px; 
         
    }
 
    a:hover
    {
        background-color: black;
        transition-duration: 2s;
        transition-property: all;/*ms edge*/
        width: 150px;
        padding: 15px;
    }
</style>
<body>
     
    <div>
        <img src="<?php echo $thumbnail;?>">
        <h2><?php echo $title;?></h2>
        <a href="<?php echo $url;?>">Download</a>
        <a href="index.php">Back</a>
    </div>
 
</body>
</html>