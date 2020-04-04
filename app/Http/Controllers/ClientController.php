<?php

namespace App\Http\Controllers;

use App\Duck;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Elasticsearch\ClientBuilder;
use Elastica\Client as ElasticaClient;
use Elastica;

class ClientController extends Controller
{
    //


    protected $elasticsearch;

    protected $elastica;

    protected $elasticaIndex;

    public function __construct()
    {
        $this->elasticsearch = ClientBuilder::create()->build();

        $elastica_config=[
            'host'=>'localhost',
            'post'=>9200,
            'index'=>'pets'
        ];
        $this->elastica=new ElasticaClient($elastica_config);
        $this->elasticaIndex=$this->elastica->getIndex('pets');
    }

    public function elasticSearchTest()
    {
//        dump($this->elasticsearch);
//        $params=[
//            'index'=>'pets',
//            'type'=>'ducks',
//        ];

//        $response=$this->elasticsearch->deleteByQuery($params);
//        $response=$this->elasticsearch->search($params);

        $params=[
            'index'=>'pets',
            'type'=>'cats',
            'body'=>[
                'query'=>[
                    'match'=>[
                        'name'=>'MD'
                    ],
                ]
            ]
        ];

        $response=$this->elasticsearch->search($params);
        dump($response);

    }

    public function elasticSearchData()
    {
        $params=[
            'index'=>'pets',
            'type'=>'ducks',
            'body'=>[
                'ducks'=>[
                    '_source'=>[
                        'enabled'=>true
                    ],
                    'properties'=>[
                        'name'=>array('type'=>'string'),
                        'age'=>array('type'=>'integer'),
                        'gender'=>array('type'=>'string'),
                        'color'=>array('type'=>'string'),
                        'about'=>array('type'=>'text'),
                        'hometown'=>array('type'=>'string'),
                        'registered'=>array('type'=>'date'),
                    ]
                ]
            ]
        ];
//        $response=$this->elasticsearch->indices()->putMapping($params);
    }


    public function duckSearch(Request $request)
    {
        if($request->key)
        {

            $results=Duck::search($request->key)->get();

            return view('duck_search',['results'=>$results]);
        }else
        {
            return view('duck_search');
        }
    }



}
