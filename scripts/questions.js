const sorus = [
    {
        id:1,
        question: "Bu resimdeki cirkini ne kadar seviyorum sence?",
        img:"https://hediyapp.herokuapp.com/qPics/buCirkiniNeKadar.JPG",
        answers: [
            {value: 1, option: "Eh iste"},
            {value: 4, option: "Kucak dolusu"},
            {value: 6, option: "Ne biliyim lan ben!"},
            {value: 10, option: "Olculemez!"}
        ]           
    },
    {
        id:2,
        question: "Burda ki mutluluga bi rakam versen, bu kac olurdu?",
        img:"https://hediyapp.herokuapp.com/qPics/BurdakiMutlulugunDegeri.JPG",
        answers: [
            {value: 6, option: "Huh, bu da mutluluk mu?!"},
            {value: 10, option: "Hala o anin etkisindeyim"},
            {value: 2, option: "Yani bilemedim ki simdi birden sorunca"},
            {value: 8, option: "Hadi ayip olmasin, 8 tamam"}
        ]  
    },
    {
        id:3,
        question: "Bu el kimin eli?",
        img:"https://hediyapp.herokuapp.com/qPics/elKimin.jpg",
        answers: [
            {value: 1, option: "Uff sirada ki soru lutfen!!"},
            {value: 7, option: "Hmmmm"},
            {value: 4, option: "Bence gayet guzel el ve kol"},
            {value: 10, option: "Balim, bu da sorumu"}
        ] 
    },
    {
        id:4,
        question: "Aklimdan burda gecen ne olabilir?",
        img:"https://hediyapp.herokuapp.com/qPics/aklimdangecenne.png",
        answers: [
            {value: 3, option: "Uff gunes batsa da gitsek!!"},
            {value: 6, option: "Ne kadar sansli bi kiz ya"},
            {value: 10, option: "Simdi söylersem, telefonu kapatip ..."},
            {value: 4, option: "Banane!!!"}
        ]      
    },
    {
        id:5,
        question: "Burda evet dendi okey, tamam ama tekrar sorsalar cevabin ne olurdu?",
        img:"https://hediyapp.herokuapp.com/qPics/sizcecevapne.jpg",
        answers: [
            {value: 7, option: "Evet!"},
            {value: 3, option: "Yok almayim!"},
            {value: 6, option: "Artik cok gec!"},
            {value: 10, option: "O bi kere olur!"}
        ]       
    },
    {
        id:6,
        question: "Ilk gittigimiz mekana poanin kac?",
        img:"https://hediyapp.herokuapp.com/qPics/ilkbulusma.JPG",
        answers: [
            {value: 3, option: "10 uzerinden 3"},
            {value: 5, option: "10 uzerinden 5"},
            {value: 7, option: "10 uzerinden 7"},
            {value: 4, option: "Gözum senden baska bisey göruyor mu benim <3"}
        ]      
    },
    {
        id:7,
        question: "Bu tatliliga poanim kac?",
        img:"https://hediyapp.herokuapp.com/qPics/tatlim.jpg",
        answers: [
            {value: 8, option: "Tabikisi 10"},
            {value: 7, option: "Eh ayip olmasin, 7"},
            {value: 4, option: "Cirkine olucakti, soru hatali"},
            {value: 10, option: "Ölculemez ki bu, hatali soru"}
        ]        
    },
    {
        id:8,
        question: "Saat burda tam olarak kac olabilir?",
        img:"https://hediyapp.herokuapp.com/qPics/saatKac.jpg",
        answers: [
            {value: 10, option: "17:00 civari olmasi lazim"},
            {value: 1, option: "Yok artik, böyle soru mu olur!"},
            {value: 8, option: "Seninleyken zaman durdugu icin, suan saat kacsa o <3"},
            {value: 5, option: "Durdu zamanim, bisey diyemedim. Gitmek istedi ..."}
        ]         
    },
    {
        id:9,
        question: "Resimde ki meshur deve kac yilda olusmustur?",
        img:"https://hediyapp.herokuapp.com/qPics/meshurPeriBacasi.jpg",
        answers: [
            {value: 1, option: "Ne biliyim, git deveye sor!"},
            {value: 10, option: "Yatalim mi?"},
            {value: 5, option: "Gec bu soruyu!"},
            {value: 9, option: "Lavlar, ruzgarlar, en az 3000-4000 yillik"}
        ]       
    },
    {
        id:10,
        question: "Fotografta anlatilmak istenen sey ne?",
        img:"https://hediyapp.herokuapp.com/qPics/gunesbatimi.jpg",
        answers: [
            {value: 6, option: "Cayim sogudu yine"},
            {value: 2, option: "Aciktim"},
            {value: 8, option: "Gunes batti, hadi biz de yatalimm"},
            {value: 10, option: "Seni Seviyorum!!"}
        ] 
    },
    {
        id:11,
        question: "Sence konusulan konu ne? (Altin soru)",
        img:"https://hediyapp.herokuapp.com/qPics/bonus.JPG",
        answers: [
            {value: 15, option: "Amcanin `Kama` meyve bicagi"},
            {value: 12, option: "Amcanin balkonu"},
            {value: 7, option: "Amcanin göbegi"},
            {value: 5, option: "Ciddi biseyler"}
        ] 
    },
    {
        id:12,
        question: "Bu uyuyan guzeli nasil uyandirmali?",
        img:"https://hediyapp.herokuapp.com/qPics/nasiluyandirirsin.jpg",
        answers: [
            {value: 6, option: "Bi kova suyla"},
            {value: 5, option: "Durterek"},
            {value: 3, option: "Tokatla"},
            {value: 10, option: "Öperek"}
        ] 
    },
    {
        id:13,
        question: "En sevdigim renk?",
        img:"https://hediyapp.herokuapp.com/qPics/favoriRenk.jpg",
        answers: [
            {value: 3, option: "Mavi"},
            {value: 5, option: "Sari"},
            {value: 5, option: "Siyah"},
            {value: 10, option: "Kirmizi"}
        ] 
    }, 
    {
        id:14,
        question: "Kara kara ne dusunuyor olabilir?",
        img:"https://hediyapp.herokuapp.com/qPics/dusunceli.jpg",
        answers: [
            {value: 5, option: "Uykuyu"},
            {value: 5, option: "Huzuru"},
            {value: 5, option: "Mutlulugu"},
            {value: 10, option: "Esini"}
        ] 
    },
    {
        id:15,
        question: "Uyku mu tatli?, Bu pamuk mu?",
        img:"https://hediyapp.herokuapp.com/qPics/pamuk.jpg",
        answers: [
            {value: 6, option: "Sen"},
            {value: 10, option: "Bu pamuk"},
            {value: 1, option: "Hicbiri"},
            {value: 5, option: "Ikisi de"}
        ] 
    },
    {
        id:16,
        question: "Burda gittigimiz restauran ne zaman acilmisti?",
        img:"https://hediyapp.herokuapp.com/qPics/sirinler.jpg",
        answers: [
            {value: 6, option: "10 yil önce"},
            {value: 1, option: "Hatirlamiyorum"},
            {value: 3, option: "Ne biliyim"},
            {value: 10, option: "15 yil??"}
        ] 
    },
    {
        id:17,
        question: "Aklindan gecen ne?",
        img:"https://hediyapp.herokuapp.com/qPics/gözler.jpg",
        answers: [
            {value: 6, option: "Fesatlik"},
            {value: 10, option: "Su masumiyete bak"},
            {value: 1, option: "Seytanlik"},
            {value: 3, option: "Odunluk"}
        ] 
    },
    {
        id:18,
        question: "Birbirimize puanimiz?",
        img:"https://hediyapp.herokuapp.com/qPics/tipler.jpg",
        answers: [
            {value: 10, option: "Gec hemen sunu"},
            {value: 5, option: "Yorumsuz"},
            {value: 4, option: "Eh acemilik"},
            {value: 8, option: "Muq!"}
        ] 
    },
    {
        id:19,
        question: "Evliligimiz adam kadar parlak olucak mi?",
        img:"https://hediyapp.herokuapp.com/qPics/nikahgun.jpg",
        answers: [
            {value: 4, option: "Hahah"},
            {value: 3, option: "Yok be nerdee"},
            {value: 10, option: "Insallah"},
            {value: 6, option: "Hedefimiz o"}
        ] 
    },
    {
        id:20,
        question: "O zamana dönmek ister miydin?",
        img:"https://hediyapp.herokuapp.com/qPics/iremKoy.jpg",
        answers: [
            {value: 7, option: "Bilmem"},
            {value: 4, option: "Belki"},
            {value: 6, option: "Hayir"},
            {value: 10, option: "Guzel gunlerdi"}
        ] 
    },
    {
        id:21,
        question: "Karizmatiklik seviyem?",
        img:"https://hediyapp.herokuapp.com/qPics/karizma.jpg",
        answers: [
            {value: 4, option: "4"},
            {value: 6, option: "6"},
            {value: 8, option: "8"},
            {value: 10, option: "10"}
        ] 
    },
    {
        id:22,
        question: "Dusuncelerin?",
        img:"https://hediyapp.herokuapp.com/qPics/seyma.jpg",
        answers: [
            {value: 4, option: "Zaman su gibi"},
            {value: 10, option: "Uzun yazin basi"},
            {value: 6, option: "Hey gidi Seyma"},
            {value: 8, option: "Gereksiz kaygilar"}
        ] 
    },
    {
        id:23,
        question: "Ne diyosun?",
        img:"https://hediyapp.herokuapp.com/qPics/kaanPasta.jpg",
        answers: [
            {value: 5, option: "Off, canim cekti"},
            {value: 10, option: "Bi öpucuk versene"},
            {value: 7, option: "Kimse yemedi umarim"},
            {value: 8, option: "Yakismis"}
        ] 
    },
    {
        id:24,
        question: "Lokum nasildi?",
        img:"https://hediyapp.herokuapp.com/qPics/lokum.jpg",
        answers: [
            {value: 5, option: "Lokumdan sogudum"},
            {value: 7, option: "Ulan bitane"},
            {value: 10, option: "Ya, aslinda guzeldi"},
            {value: 4, option: "Mecburiyet"}
        ] 
    },
    {
        id:25,
        question: "Burda yedigimiz yemek neydi?",
        img:"https://hediyapp.herokuapp.com/qPics/catal.jpg",
        answers: [
            {value: 10, option: "Yas pasta"},
            {value: 7, option: "Patates kizartmasi"},
            {value: 0, option: "Cag kebabi"},
            {value: 0, option: "Kokorec"}
        ] 
    },
    {
        id:26,
        question: "Ya bu nasil tatlilik?",
        img:"https://hediyapp.herokuapp.com/qPics/bebek.jpg",
        answers: [
            {value: 5, option: "Senin yansiman"},
            {value: 7, option: "Gözlerinin guzelligi"},
            {value: 8, option: "Askinin eseri"},
            {value: 10, option: "Uyku sagolsun"}
        ] 
    },
    {
        id:27,
        question: "Neyi farkli yapmak isterdin?",
        img:"https://hediyapp.herokuapp.com/qPics/ucgenEv.jpg",
        answers: [
            {value: 5, option: "Hicbir seyi"},
            {value: 7, option: "Daha az utanmak"},
            {value: 10, option: "Gözlerinde kaybolmak"},
            {value: 3, option: "Daha guzel poz vermek"}
        ] 
    },
    {
        id:28,
        question: "Sence yapabiliyor muyum?",
        img:"https://hediyapp.herokuapp.com/qPics/dudak.jpg",
        answers: [
            {value: 10, option: "Muq!"},
            {value: 7, option: "Eh!"},
            {value: 5, option: "Az daha zorlasan, belki"},
            {value: 1, option: "Hayir"}
        ] 
    },
    {
        id:29,
        question: "En cok hangisini seviyorsun?",
        img:"https://hediyapp.herokuapp.com/qPics/kardesler.jpg",
        answers: [
            {value: 10, option: "Berivan"},
            {value: 5, option: "Ilayda"},
            {value: 7, option: "Narin"},
            {value: 8, option: "Hicbirini"}
        ] 
    },
    {
        id:30,
        question: "Bu restoranin en guzel seyi?",
        img:"https://hediyapp.herokuapp.com/qPics/aspava.jpg",
        answers: [
            {value: 10, option: "Demlik cayi"},
            {value: 10, option: "Sen"},
            {value: 5, option: "Döneri"},
            {value: 3, option: "Lavabosu"}
        ] 
    },
    {
        id:31,
        question: "Burda ki gerceklik?",
        img:"https://hediyapp.herokuapp.com/qPics/opucuk.jpg",
        answers: [
            {value: 0, option: "0%"},
            {value: 10, option: "Kameraya oynamak"},
            {value: 8, option: "100%"},
            {value: 6, option: "Eh, ayip olmasin diye"}
        ] 
    },
    {
        id:32,
        question: "Foto da en begendigim sey ne olabilir?",
        img:"https://hediyapp.herokuapp.com/qPics/prenses.jpg",
        answers: [
            {value: 5, option: "Saclarin"},
            {value: 5, option: "Gulusun"},
            {value: 8, option: "Dudaklarin"},
            {value: 10, option: "Masumiyetin"}
        ] 
    },
    {
        id:33,
        question: "Sence seni ne kadar seviyorum?",
        img:"https://hediyapp.herokuapp.com/qPics/ucgenEv1.jpg",
        answers: [
            {value: 5, option: "Yer gök arasi"},
            {value: 8, option: "Dunyadaki kum taneleri"},
            {value: 5, option: "Tum yildizlar"},
            {value: 10, option: "Sevginin kendisi kadar"}
        ] 
    }
];