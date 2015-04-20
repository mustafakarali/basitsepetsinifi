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

ÖRNEK:
------
include "sepet.class.php";
$sepet = new sepet;
$sepet->cerezKayit(true);
$sepet->ekle('urun',5);
$sepet->ekle('urun1',5);
$sepet->ekle('urun2',5);
$sepet->ekle('urun3',5);
$sepet->guncelle('urun3',2);
$sepet->sil('urun',1);
$sepet->urunSil('urun');
//$sepet->temizle(); // Açarsanız sepeti boşaltır. Sınıfı denemek için önce kapatın, sonra açıp komple sepetin temizlendiğini göreceksiniz.
$sepet->debug($sepet->toplam());
$sepet->debug($sepet->getir());
