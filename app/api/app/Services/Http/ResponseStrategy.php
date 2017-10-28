<?php

namespace App\Services\Http;

use Illuminate\Support\Facades\App;

class ResponseStrategy
{
    private $formatter;
    private $app;
    private $responseStatus;

    /**
    * Set the main app to use continer method
    *
    * @param  Laravel\Lumen\Application $app
    */
	public function __construct(\Laravel\Lumen\Application $app)
	{
        $this->app = $app;
	}
    
    /**
    * Set the raw response content
    *
    * @param  string $responseContent
    * @return $this
    */
    public function setFormatter($response)
    {
    	$this->responseStatus = $response->status();
    	$responseContent = $response->getOriginalContent();
    	$responseContent = is_array($responseContent) ? $responseContent : [$responseContent];
        $this->formatter = $this->app->makeWith('SoapBox\Formatter\Formatter', $responseContent);
  
        return $this;
    }

    /**
    * Set the content_type
    *
    * @param  string $content_type
    * @return string text
    */
    public function getContent($content_type)
    {
        switch($content_type)
        {
            case 'application/json':
                return $this->getResponseInstance($this->formatter->toJson(), $this->responseStatus)
                 			  ->header('Content-Type', 'application/json');
            break;
            case 'application/xml':
    
                return $this->getResponseInstance($this->formatter->toXml(), $this->responseStatus)
             				  ->header('Content-Type', 'application/xml');
            break;
            default:
                throw new \Exception("No Content-Type defined");
        }
    }

    private function getResponseInstance($type, $status)
    {
        return $this->app->makeWith('Illuminate\Http\Response', ['type' => $type, 'status' => $status]);
    }
}
