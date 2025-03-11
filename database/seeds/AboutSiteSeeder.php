<?php

namespace Database\Seeders;

use App\Models\AboutSite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutSite::create([
            'whom_ar' => '',
            'whom_en' => '',
            'contact_us_ar' => '',
            'contact_us_en' => '',
            'whom_brochure' => '',
            'who_are_we_ar' => '',
            'who_are_we_en' => '',
            'who_are_we_profile' => '',

            'about_doctor_en' => 'Expert Clinical Psychologist in UK Dr Altawil a certified specialist in clinical psychology,
                                    concerned with the assessment and treatment of mental illness and behavioural problems.
                                    Dr Altawil is a consultant Clinical Psychologist registered by HCPC.
                                    Dr Altawil has more than 20 years of clinical experience and has two Ph.D’s in Mental Health from Cairo and Clinical Psychology from London.
                                    My other passion is publishing, you can find several publications within this site. Dr Altawil is a scientist,
                                    researcher and developer of the Sustainable Psychotherapy Approach.
                                    Dr Altawil is the main founder of Palestine Trauma Centre in Gaza (2007) and in the UK (2010).
                                    Dr Altawil is visiting Lecturer for doctorate in clinical psychology at the University of Hertfordshire',

            'about_doctor_ar' => 'خبير علم النفس العيادي في المملكة المتحدة الدكتور الطويل أخصائي معتمد في علم النفس الإكلينيكي يهتم بتقييم وعلاج الأمراض النفسية والمشاكل السلوكية.
                                الدكتور الطويل استشاري الأمراض النفسية و العلاج النفسي حاصل على ترخيص من هيئة الاعتماد البريطانية للتخصصات الطبيبة HCPC يتمتع الدكتور الطويل بأكثر من 20 عامًا في العلاج الاكلينيكي،
                                وحاصل على درجتي دكتوراه في الصحة العقلية من القاهرة وعلم النفس العيادي من لندن.
                                قام الدكتور الطويل بنشر العديد من الكتب والمقاييس والاختبارات النفسية والأبحاث العلمية المحكمة في مجلات عالمية مهنية محكمة ، يمكنك العثور على العديد من المنشورات داخل هذا الموقع.
                                الدكتور الطويل عالم وباحث ومطور لبرنامج العلاج النفسي المستدام. الدكتور الطويل هو المؤسس الرئيسي لمركز فلسطين للإصابات في غزة (2007) وفي المملكة المتحدة (2010).
                                الدكتور الطويل هو محاضر ومدرب ومشرف زائر على طلبة للدكتوراه في علم النفس الإكلينيكي في جامعة هيرتفوردشاير.',


            'why_chose_us_title_en' => '',
            'why_chose_us_title_ar' => '',
            'why_chose_us_details_en' => '',
            'why_chose_us_details_ar' => '',
            'why_chose_us_photo' => '',

            'counter_icon_one' => '',
            'counter_ar_one' => 'شفاء نفسي',
            'counter_en_one' => 'Recoveries',
            'counter_number_one' => '3138',

            'counter_icon_two' => '',
            'counter_ar_two' => 'استشارات مجانية',
            'counter_en_two' => 'Free Consultations',
            'counter_number_two' => '2850',

            'counter_icon_three' => '',
            'counter_ar_three' => 'عدد الحالات المعالجة',
            'counter_en_three' => 'Treated Cases',
            'counter_number_three' => '3350',

            'counter_icon_four' => '',
            'counter_ar_four' => 'الجوائز المحققة',
            'counter_en_four' => 'Awards Winning',
            'counter_number_four' => '36',

        ]);

    }
}
