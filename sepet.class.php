<?php
/*
* Tüm sepet işlemlerini içeren basit sepet sınıfı
* @package sepet
* @author Mustafa KARALI <justkarali@gmail.com>
* @link http://www.birharika.com
* @copyright 2015
* @version 0.1
* @access public

KULLANIM:
---------
$sepet = new sepet; Sınıfı başlat
$sepet->cerezKayit(true); Sepette çerez kullanıp kullanmayacağımızı belirleyelim.
$sepet->ekle('urun',adet); Sepete ekleme fonksiyonu
$sepet->sil('urun',adet); Adet bazında sepetten silme veya varolan ürünün adet sayısını düşürme fonksiyonu 
$sepet->guncelle('urun',adet); Adet bazında sepetteki ürünü güncelleme fonksiyonu 
$sepet->urunSil('urun'); Sepetten belirlediğiniz ürünü komple silme fonksiyonu
$sepet->temizle(); Sepeti tamamen temizleme fonksiyonu
$sepet->toplam(); Sepete eklediğiniz ürünlerin toplam adet sayısını öğrendiğimiz fonksiyon
$sepet->getir(); Sepetinizde bulunan ürünleri dizi olarak döndürür Örnek: urun => adet
$sepet->debug(); Sepetiniz ile ilgili debug işlemleri için fonksiyon
*/
class sepet
{
    public $cerezAdi	= 'sepetimiz';
    public $cerezTarih	= 86400; // 1 Gün
    public $cerezKayit	= true;
	
    function __construct()
    {
        session_start();
        if(!isset($_SESSION[$this->cerezAdi]) && (isset($_COOKIE[$this->cerezAdi])))
		{
            $_SESSION[$this->cerezAdi] = unserialize(base64_decode($_COOKIE[$this->cerezAdi]));
        }
    }
	
    function ekle($ID,$adet=1)
    {
        if(isset($_SESSION[$this->cerezAdi][$ID]))
		{
            $_SESSION[$this->cerezAdi][$ID] = $_SESSION[$this->cerezAdi][$ID] + $adet;
        }
		else
		{
            $_SESSION[$this->cerezAdi][$ID] = $adet;
        }
        $this->cerez();
        return true;
    }
	
    function sil($ID,$adet=1)
    {
        if(isset($_SESSION[$this->cerezAdi][$ID]))
		{
            $_SESSION[$this->cerezAdi][$ID] = $_SESSION[$this->cerezAdi][$ID] - $adet;
        }
        if($_SESSION[$this->cerezAdi][$ID] <= 0)
		{
            $this->urunSil($ID);
        }
        $this->cerez();
        return true;
        exit();
    }
	
    function urunSil($ID)
    {
        unset($_SESSION[$this->cerezAdi][$ID]);
        $this->cerez();
        return true;
        exit();
    }
	
    function getir()
    {
        if(isset($_SESSION[$this->cerezAdi])) {
            foreach ($_SESSION[$this->cerezAdi] as $k => $v)
			{
                $urunler[$k] = $v;
            }
            return $urunler;
            exit();
        }
		else
		{
            return false;
        }
    }
	
    function guncelle($ID,$adet)
    {
        $adet = ($adet == '') ? 0 : $adet;
        if(isset($_SESSION[$this->cerezAdi][$ID]))
		{
            $_SESSION[$this->cerezAdi][$ID] = $adet;
            if($_SESSION[$this->cerezAdi][$ID] <= 0)
			{
                $this->urunSil($ID);
                return true;
                exit();
            }
			else
			{
				$this->cerez();
				return true;
				exit();
			}
        }
		else
		{
            return false;
        }
    }
	
    function toplam()
    {
        if(isset($_SESSION[$this->cerezAdi]))
		{
            $adet = 0;
            foreach ($_SESSION[$this->cerezAdi] as $icerik)
			{
                $adet += $icerik;
            }
            return $adet;
        }
		else
		{
            return 0;
        }
    }
	
    function temizle()
    {
        unset($_SESSION[$this->cerezAdi]);
        $this->cerez();
        return true;
    }
	
    function cerez()
    {
        if($this->cerezKayit)
		{
			if(isset($_SESSION[$this->cerezAdi]))
			{
				$dizi = base64_encode(serialize($_SESSION[$this->cerezAdi]));
				setcookie($this->cerezAdi, $dizi, time() + $this->cerezTarih, '/');
				return true;
			}
			else
			{
				return false;
			}
        }
		else
		{
        	return false;
		}
    }
	
    function cerezKayit($deger=true)
    {
        $this->cerezKayit = $deger;
        return true;
    }
	
    function debug($deger)
    {
		echo "<pre>";
        print_r($deger);
		echo "</pre>";
    }
}
?>