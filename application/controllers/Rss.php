<?php
//Rss.php
class Rss extends CI_Controller {


    public function index()
    {
            
          //$request = "http://rss.news.yahoo.com/rss/software";
          
        
        /*
        https://www.google.com/search?hl=en&gl=us&tbm=nws&authuser=0&q=arabian+stallion&oq=arabian+stalliion&gs_l=news-cc.12..43j43i53.5952.8694.0.10664.17.9.0.8.1.0.46.308.9.9.0...0.0...1ac.1.rZYl1AUM6jI#hl=en&gl=us&authuser=0&tbm=nws&q=arabian+stallion
        
        
        
        
        
        
        */
        $request = "https://news.google.com/news?pz=1&cf=all&ned=us&hl=en&q=arabian+stallion&output=rss";
          $response = file_get_contents($request);
          $xml = simplexml_load_string($response);
          print '<h1>' . $xml->channel->title . '</h1>';
          foreach($xml->channel->item as $story)
          {
            echo '<a href="' . $story->link . '">' . $story->title . '</a><br />'; 
            echo '<p>' . $story->description . '</p><br /><br />';
          }
            //$data['news'] = $this->news_model->get_news();
            //$data['title'] = 'News archive';

            //$this->load->view('templates/header', $data);
            //$this->load->view('news/index', $data);
           //$this->load->view('templates/footer');
    }//end index()

 
    
    
}//end Rss