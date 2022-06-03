<?php
class Date
{
    private $date;

    public function __construct($date = null)
    {
        // РµСЃР»Рё РґР°С‚Р° РЅРµ РїРµСЂРµРґР°РЅР° - РїСѓСЃС‚СЊ Р±РµСЂРµС‚СЃСЏ С‚РµРєСѓС‰Р°СЏ
        if (!empty($date)) {
            $this->date = date('Y-m-d', strtotime($date));
        } else {
            $this->date = date('Y-m-d', time());
        }
    }

    public function getDay()
    {
        // РІРѕР·РІСЂР°С‰Р°РµС‚ РґРµРЅСЊ
        return date('d', strtotime($this->date));

    }

    public function getMonth($lang = null)
    {
        $ruMonths =  [1 => 'РЇРЅРІР°СЂСЊ' , 'Р¤РµРІСЂР°Р»СЊ' , 'РњР°СЂС‚' , 'РђРїСЂРµР»СЊ' , 'РњР°Р№' , 'РСЋРЅСЊ' , 'РСЋР»СЊ' , 'РђРІРіСѓСЃС‚' , 'РЎРµРЅС‚СЏР±СЂСЊ' , 'РћРєС‚СЏР±СЂСЊ' , 'РќРѕСЏР±СЂСЊ' , 'Р”РµРєР°Р±СЂСЊ' ];
        $engMonths = [1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $dateMonth = date('n', strtotime($this->date));
        // РІРѕР·РІСЂР°С‰Р°РµС‚ РјРµСЃСЏС†
        if (empty($lang)) {
            return date('m', strtotime($this->date));
        }

        // РїРµСЂРµРјРµРЅРЅР°СЏ $lang РјРѕР¶РµС‚ РїСЂРёРЅРёРјР°С‚СЊ Р·РЅР°С‡РµРЅРёРµ ru РёР»Рё en
        // РµСЃР»Рё СЌС‚Р° РЅРµ РїСѓСЃС‚Р° - РїСѓСЃС‚СЊ РјРµСЃСЏС† Р±СѓРґРµС‚ СЃР»РѕРІРѕРј РЅР° Р·Р°РґР°РЅРЅРѕРј СЏР·С‹РєРµ
        if ($lang == 'ru') {
            return $ruMonths[$dateMonth];
        }
        if ($lang == 'en') {
            return $engMonths[$dateMonth];
        }
    }

    public function getYear() // РІРѕР·РІСЂР°С‰Р°РµС‚ РіРѕРґ
    {
        return date('Y', strtotime($this->date));

    }

    public function getWeekDay($lang = null) 
    {
        $daysRu =  [1 => 'РџРѕРЅРµРґРµР»СЊРЅРёРє' , 'Р’С‚РѕСЂРЅРёРє' , 'РЎСЂРµРґР°' , 'Р§РµС‚РІРµСЂРі' , 'РџСЏС‚РЅРёС†Р°' , 'РЎСѓР±Р±РѕС‚Р°' , 'Р’РѕСЃРєСЂРµСЃРµРЅСЊРµ'] ;
        $daysEn =  [1 => 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $dateDay = date('w', strtotime($this->date));
        // РІРѕР·РІСЂР°С‰Р°РµС‚ РґРµРЅСЊ РЅРµРґРµР»Рё
        if (empty($lang)) {
            return date('w', strtotime($this->date));
        }
        // РїРµСЂРµРјРµРЅРЅР°СЏ $lang РјРѕР¶РµС‚ РїСЂРёРЅРёРјР°С‚СЊ Р·РЅР°С‡РµРЅРёРµ ru РёР»Рё en
        // РµСЃР»Рё СЌС‚Р° РЅРµ РїСѓСЃС‚Р° - РїСѓСЃС‚СЊ РјРµСЃСЏС† Р±СѓРґРµС‚ СЃР»РѕРІРѕРј РЅР° Р·Р°РґР°РЅРЅРѕРј СЏР·С‹РєРµ
        if ($lang == 'ru') {
            return $daysRu[$dateDay];
        }
        if ($lang == 'en') {
            return $daysEn[$dateDay];
        }
    }

    public function addDay($value)
    {
        // РґРѕР±Р°РІР»СЏРµС‚ Р·РЅР°С‡РµРЅРёРµ $value Рє РґРЅСЋ
        $dateM = date_create($this->date);
        date_modify($dateM, "+$value days");
        return date_format($dateM, 'Y-m-d');
    }

    public function subDay($value) // РѕС‚РЅРёРјР°РµС‚ Р·РЅР°С‡РµРЅРёРµ $value РѕС‚ РґРЅСЏ
    {
        $dateM = date_create($this->date);
        date_modify($dateM, "-$value days");
        return date_format($dateM, 'Y-m-d');
    }

    public function addMonth($value) // РґРѕР±Р°РІР»СЏРµС‚ Р·РЅР°С‡РµРЅРёРµ $value Рє РјРµСЃСЏС†Сѓ
    {
        $dateM = date_create($this->date);
        date_modify($dateM, "+$value month");
        return date_format($dateM, 'Y-m-d');
    }

    public function subMonth($value) // РѕС‚РЅРёРјР°РµС‚ Р·РЅР°С‡РµРЅРёРµ $value РѕС‚ РјРµСЃСЏС†Р°
    {
        $dateM = date_create($this->date);
        date_modify($dateM, "-$value month");
        return date_format($dateM, 'Y-m-d');
    }

    public function addYear($value) // РґРѕР±Р°РІР»СЏРµС‚ Р·РЅР°С‡РµРЅРёРµ $value Рє РіРѕРґСѓ
    {
        $dateM = date_create($this->date);
        date_modify($dateM, "+$value year");
        return date_format($dateM, 'Y-m-d');
    }

    public function subYear($value) // РѕС‚РЅРёРјР°РµС‚ Р·РЅР°С‡РµРЅРёРµ $value РѕС‚ РіРѕРґР°
    {
        $dateM = date_create($this->date);
        date_modify($dateM, "-$value year");
        return date_format($dateM, 'Y-m-d');
    }

    public function format($format)
    {
        // РІС‹РІРµРґРµС‚ РґР°С‚Сѓ РІ СѓРєР°Р·Р°РЅРЅРѕРј С„РѕСЂРјР°С‚Рµ
        // С„РѕСЂРјР°С‚ РїСѓСЃС‚СЊ Р±СѓРґРµС‚ С‚Р°РєРѕР№ Р¶Рµ, РєР°Рє РІ С„СѓРЅРєС†РёРё date
        return date($format, strtotime($this->date));
    }

    public function __toString()
    {
        // РІС‹РІРµРґРµС‚ РґР°С‚Сѓ РІ С„РѕСЂРјР°С‚Рµ 'РіРѕРґ-РјРµСЃСЏС†-РґРµРЅСЊ'
        return $this->date;
    }
} 