<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParserController extends Controller
{

    protected function pchome ($product)
    {
        $list = json_decode(file_get_contents('http://ecshweb.pchome.com.tw/search/v3.3/all/results?q=' . urlencode($product)));
        $products = array();
        foreach($list->prods as $item) {
            $products[] = array(
                'name' => trim($item->name),
                'link' => trim('http://24h.pchome.com.tw/prod/' . $item->Id),
                'image' => 'http://a.ecimg.tw/' . trim($item->picS),
                'price' => intval($item->price),
            );
        }
        return $products;
    }

    protected function momo ($product)
    {
        $html = new \Htmldom('http://www.momoshop.com.tw/mosearch/' . urlencode($product) . '.html');
        $list = $html->find('div[id=searchResults]', 0)->find('ul[id=chessboard]', 0);
        $products = array();
        foreach($list->find('li') as $element) {
            $products[] = array(
                'name' => trim($element->find('span[id=goods_name]', 0)->find('a', 0)->innertext),
                'link' => trim($element->find('span[id=goods_name]', 0)->find('a', 0)->href),
                'image' => trim($element->find('img', 0)->src),
                'price' => intval($element->find('span[class=money]', 0)->find('b', 0)->innertext),
            );
        }
        return $products;
    }

    protected function yahoo ($product)
    {
        $html = new \Htmldom('https://tw.search.buy.yahoo.com/search/shopping/product?p=' . urlencode($product));
        $list = $html->find('div[id=srp_result_list]', 0);
        $products = array();
        foreach($list->find('div[class=item]') as $element) {
            $products[] = array(
                'name' => trim($element->find('div[class=yui3-u]', 1)->find('div[class=srp-pdtitle]', 0)->find('a', 0)->innertext),
                'link' => trim($element->find('div[class=yui3-u]', 1)->find('div[class=srp-pdtitle]', 0)->find('a', 0)->href),
                'image' => trim($element->find('div[class=yui3-u]', 0)->find('img', 0)->src),
                'price' => str_replace('$', '', $element->find('div[class=srp-pdtaglist]', 0)->find('em', 0)->innertext),
            );
        }
        return $products;
    }

    protected function books ($product)
    {
        $html = new \Htmldom('http://search.books.com.tw/search/query/key/' . urlencode($product));
        $list = $html->find('ul[class=searchbook]', 0);
        $products = array();
        $property = 'data-original';
        foreach($list->find('li') as $element) {
            $products[] = array(
                'name' => trim($element->find('h3', 0)->find('a', 0)->innertext),
                'link' => trim($element->find('h3', 0)->find('a', 0)->href),
                'image' => trim($element->find('a', 0)->find('img', 0)->$property),
                'price' => count($element->find('span[class=price]', 0)->find('strong'))>1? intval($element->find('span[class=price]', 0)->find('strong', 1)->find('b', 0)->innertext) : intval($element->find('span[class=price]', 0)->find('strong', 0)->find('b', 0)->innertext)
            );
        }
        return $products;
    }

    public function parser ($product = false)
    {
        $products = array();
        if ($product) {
            $products = array(
                'pchome' => $this->pchome($product),
                'momo' => $this->momo($product),
                'yahoo' => $this->yahoo($product),
                'books' => $this->books($product)
            );
        }
        return view('parser', $products);
        // return response()->json($products);
    }

}
