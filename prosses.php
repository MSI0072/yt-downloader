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
            $judul = $downloader
                ->info->title;
            if ($judul == null)
            {
                $title = "Video Not Found, Check your url!";
                $thumbnail = "images/404-graphic.jpg";
                $url = "#";
            }
            else
            {
                $title = $downloader
                    ->info->title;
                $thumbnail = $downloader
                    ->info->thumbnail;
                $url = $downloader
                    ->info->url;
            }
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
            $judul = $downloader
                ->result->textInfo;
            if ($judul == null)
            {
                $title = "Video Not Found, Check your url!";
                $thumbnail = "images/404-graphic.jpg";
                $url = "#";
            }
            else
            {
                $title = $downloader
                    ->result->textInfo;
                $thumbnail = $downloader
                    ->result->image;
                $url = $downloader
                    ->result->mp4direct;
            }

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
            $judul = $downloader->titleInfo;
            if ($judul == null)
            {
                $title = "Video Not Found, Check your url!";
                $thumbnail = "images/404-graphic.jpg";
                $url = "#";
            }
            else
            {
                $title = $downloader->titleInfo;
                $thumbnail = $downloader->getImages;
                $url = $downloader->getAudio;
            }
        }
    }
    else
    {
        echo 'error woy';
    }
}
?>
