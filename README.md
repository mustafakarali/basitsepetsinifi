* Tüm sepet işlemlerini içeren basit sepet sınıfı
* @package sepet
* @author Mustafa KARALI <justkarali@gmail.com>
* @link http://www.birharika.com
* @copyright 2015
* @version 0.1
* @access public

KULLANIM:
---------
<strong>$sepet = new sepet;</strong> Sınıfı başlat<br>
<strong>$sepet->cerezKayit(true);</strong> Sepette çerez kullanıp kullanmayacağımızı belirleyelim.<br>
<strong>$sepet->ekle('urun',adet);</strong> Sepete ekleme fonksiyonu<br>
<strong>$sepet->sil('urun',adet);</strong> Sepette varolan ürünün adet sayısını düşürme veya silme fonksiyonu<br>
<strong>$sepet->guncelle('urun',adet);</strong> Adet bazında sepetteki ürünü güncelleme fonksiyonu <br>
<strong>$sepet->urunSil('urun');</strong> Sepetten belirlediğiniz ürünü komple silme fonksiyonu<br>
<strong>$sepet->temizle();</strong> Sepeti tamamen temizleme fonksiyonu<br>
<strong>$sepet->toplam();</strong> Sepete eklediğiniz ürünlerin toplam adet sayısını öğrendiğimiz fonksiyon<br>
<strong>$sepet->getir();</strong> Sepetinizde bulunan ürünleri dizi olarak döndürür Örnek: urun => adet<br>
<strong>$sepet->debug();</strong> Sepetiniz ile ilgili debug işlemleri için fonksiyon<br>

ÖRNEK:
------
include "sepet.class.php";<br>
$sepet = new sepet;<br>
$sepet->cerezKayit(true);<br>
$sepet->ekle('urun',5);<br>
$sepet->ekle('urun1',5);<br>
$sepet->ekle('urun2',5);<br>
$sepet->ekle('urun3',5);<br>
$sepet->guncelle('urun3',2);<br>
$sepet->sil('urun',1);<br>
$sepet->urunSil('urun');<br>
//$sepet->temizle(); // Açarsanız sepeti boşaltır. Sınıfı denemek için önce kapatın, sonra açıp komple sepetin temizlendiğini göreceksiniz.<br>
$sepet->debug($sepet->toplam());<br>
$sepet->debug($sepet->getir());<br>
