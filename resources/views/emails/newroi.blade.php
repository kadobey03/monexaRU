{{-- blade-formatter-disable --}}
@component('mail::message')
# Обновление портфеля - Инвестиционные доходы созданы 📈

## Дорогой {{$user->name}},

**Поздравляем!** Ваш инвестиционный портфель создал новые доходы. Мы рады сообщить, что ваши стратегические инвестиционные решения продолжают демонстрировать хорошую производительность в текущих рыночных условиях.

### 💰 **Детали доходов**

@component('mail::panel', ['color' => 'success'])
**Сводка инвестиционной производительности**

**Инвестиционный план:** {{$plan}}<br>
**Сумма дохода:** {{$user->currency}}{{number_format($amount, 2)}}<br>
**Дата создания:** {{$plandate}}<br>
**Статус:** Зачислено на ваш счет
@endcomponent

### 📊 **Анализ производительности**

Ваш инвестиционный план {{$plan}} продолжает обеспечивать стабильные доходы как часть нашей продвинутой инвестиционной стратегии. Этот доход отражает:

- **Анализ рынка**: Стратегическое позиционирование рынка нашей экспертной командой
- **Управление рисками**: Тщательно сбалансированная оптимизация портфеля
- **Технологическое превосходство**: Продвинутые алгоритмические торговые системы
- **Диверсификация**: Экспозиция на несколько активов для стабильности

### 🚀 **Максимизируйте свой потенциал роста**

**Рассмотрите эти возможности:**
- **Составной рост**: Реинвестируйте свои доходы для экспоненциального роста
- **Расширение портфеля**: Исследуйте дополнительные инвестиционные планы
- **Копирование торговли**: Автоматически следуйте за лучшими трейдерами
- **Премиум стратегии**: Перейдите на инвестиционные планы более высокого уровня

@component('mail::button', ['url' => config('app.url').'/dashboard'])
Посмотреть производительность портфеля
@endcomponent

### 📈 **Ваше инвестиционное путешествие**

**Son Etkinlik:**
✅ Yatırımımız uzman ekibimiz tarafından aktif olarak yönetiliyor<br>
✅ Getiriler oluşturuldu ve hesabınıza yatırıldı<br>
✅ Portföy optimal performans için yeniden dengelendi<br>
📊 Sürekli izleme ve optimizasyon devam ediyor

**Sonraki Adımlar:**
- Portföy performansınızı gerçek zamanlı olarak izleyin
- Bileşik büyüme için yeniden yatırım fırsatlarını düşünün
- Gelişmiş ticaret araçlarımızı ve analizlerimizi keşfedin

### 💡 **Инвестиционные insights**

@component('mail::panel')
**Piyasa Yorumu:** Mevcut piyasa koşulları çeşitlendirilmiş yatırım stratejilerini tercih ediyor. {{$plan}} planınız, risk ayarlı getirileri korurken ortaya çıkan fırsatları değerlendirecek şekilde konumlandırılmıştır.
@endcomponent

**Yatırım İpuçları:**
- **Tutarlılık**: Düzenli yatırımlar genellikle piyasa zamanlamasını geride bırakır
- **Çeşitlendirme**: Riski birden fazla yatırım aracı arasında dağıtın
- **Uzun Vadeli Vizyon**: Hızlı kazançlardan ziyade sürdürülebilir büyümeye odaklanın
- **Profesyonel Yönetim**: Uzman ekibimizin piyasa uzmanlığından yararlanın

### 📞 **Profesyonel Yatırım Desteği**

Yatırım danışmanlık ekibimiz portföy stratejilerinizi optimize etmenize yardımcı olmak için hazır:

@component('mail::button', ['url' => config('app.url').'/login', 'color' => 'success'])
Yatırım Danışmanlığı Planla
@endcomponent

**Mevcut Hizmetler:**
- Kişisel Portföy İncelemesi
- Yatırım Stratejisi Optimizasyonu
- Piyasa Analizi ve İçgörüleri
- Risk Değerlendirmesi ve Yönetimi

### 🎯 **Daha Fazla Büyümeye Hazır mısınız?**

**Genişletme Fırsatları:**
- **Daha Yüksek Katman Planlar**: Premium yatırım stratejilerini açın
- **Kopya Ticaret Elit**: Kurumsal düzey tüccarlara erişim
- **Otomatik Yeniden Dengeleme**: AI destekli portföy optimizasyonu
- **VIP Hizmetler**: Özel yatırım danışmanı erişimi

@component('mail::button', ['url' => config('app.url').'/login'])
Yatırım Seçeneklerini Keşfedin
@endcomponent

---

### 📊 **Performans Şeffaflığı**

Yatırım performansınızla ilgili tam şeffaflığa inanıyoruz. Panonuz aracılığıyla detaylı analitiklere, geçmiş getirilere ve kapsamlı raporlamaya erişin.

**Mevcut Ana Metrikler:**
- Gerçek zamanlı portföy değerleme
- Geçmiş performans grafikleri
- Risk ayarlı getiri analizi
- Kıyaslama karşılaştırmaları

{{$settings->site_name}}'e yatırım hedeflerinizle güveniniz için teşekkür ederiz. Kanıtlanmış yatırım stratejilerimiz aracılığıyla istisnai sonuçlar sunmaya devam ediyoruz.

**Saygılarımla,**<br>
**{{$settings->site_name}} Yatırım Ekibi**<br>
*Finansal Büyümedeki Ortaklarınız*

---

@component('mail::subcopy')
**Yatırım Sorumluluk Reddi:** Geçmiş performans gelecek sonuçları garanti etmez. Tüm yatırımlar risk taşır ve yatırım yaptığınız sermayenin bir kısmını veya tamamını kaybedebilirsiniz. Bu bildirim sadece bilgilendirme amaçlıdır ve finansal tavsiye olarak düşünülmemelidir. Lütfen [Risk Açıklaması]({{config('app.url')}}/risk-disclosure)'mızı inceleyin ve bir finansal danışmanla danışmayı düşünün.

Getiriler, yatırım planınızın performansına ve piyasa koşullarına göre hesaplanır. {{$settings->site_name}} risk ayarlı getirileri optimize etmek için tasarlanmış profesyonel yatırım stratejileri kullanır.
@endcomponent

@endcomponent
{{-- blade-formatter-disable --}}
