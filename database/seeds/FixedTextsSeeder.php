<?php

use App\Models\FixedText;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class FixedTextsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        FixedText::create([
            'about_spc_title_en' => 'Sustainable Psychotherapy Centre',
            'about_spc_title_ar' => 'مركز العلاج النفسي المستدام',

            // about spc details en
            'about_spc_details_en' => 'Sustainable psychotherapy Approach(SPA) is an advanced integral system of skills,
                                        techniques and activities that the psychotherapist uses with the clients/patient with the aim of
                                        enhancing and developing concepts and applications of self-care for them, improving the image of
                                        themselves in the past, present and future. To enable them to understand and solve their problems
                                        by themselves as much as possible, and help them towards reducing symptoms to satisfy them, and
                                        to empower them with essential skills to improve life functions, thinking, feelings, physical sensations,
                                        and positive behaviours for them and their social environment for a long period of time.
                                        Also, to use the skills learned from the therapeutic journey as a new way of life. (Altawil, 2020).',

            // about spc details ar
            'about_spc_details_ar' => 'برنامج العلاج النفسي المستدام هو برنامج تكاملي متقدم يجمع العديد من المهارات والأنشطة
                                        والتقنيات العلاجية المتقدمة والتي تساعد المعالج النفسي
                                        أن يسخدمها مع الحالات بهدف تعزيز وتطوير مفاهيم وتطبيقات الرعاية الذاتية لهم ،
                                        وتحسين صورتهم في الماضي والحاضر و المستقبل .
                                        برنامج العلاج النفسي المستدام منظومة تكاملية من المهارات والتقنيات
                                        والأنشطة التي يستخدمها المعالج النفسي مع المستفيدين (الحالة/المريض) بهدف تعزيز
                                        وتنمية مفاهيم وتطبيقات الرعاية الذاتية لهم
                                        ، وتحسين صورته عن ذاته في الماضي والحاضر والمستقبل،
                                        وتمكينهم من فهم و حل مشاكلهم بأنفسهم قدر الإمكان، ومساعدتهم نحو تخفيض الأعراض المرضية لهم
                                        ، واستنهاض قدراتهم ومهاراتهم في تحسين الوظائف الحياتية والتفكير والمشاعر والأحاسيس الجسمية
                                        والسلوكيات الإيجابية لهم ولمحيطهم الاجتماعي لفترة زمنية طويلة
                                        ، وأن تصبح المهارات المستفادة من الرحلة العلاجية كأسلوب حياة (الطويل، 2020).',

            'about_spc_goal_one_en' => 'To reduce the symptoms of mental health problems',
            'about_spc_goal_two_en' => 'To improve life functioning for the clients',
            'about_spc_goal_three_en' => 'To empower clients with essential life skills to cope with difficulties, stress and painful experiences',
            'about_spc_goal_four_en' => 'To improve the quality of life by themselves through using and developing the skills which they learn from the therapeutic journey as a new way of their life.',
            'about_spc_goal_one_ar' => 'تخفيض الأعراض المرضية للحالة الناتجة على مشاكل الصحة النفسية.',
            'about_spc_goal_two_ar' => 'حسين الوظائف الحياتية للحالة .',
            'about_spc_goal_three_ar' => 'تمكين الحالة من تعلم واستخدام المهارات الحياتية الضرورية للتكيف مع مشاكل الحياة و ضغوطاتها و الخبرات الصادمة والأليمة.',
            'about_spc_goal_four_ar' => 'تحسين مستوى جودة الحياة للحالة وتمكينها من استخدامها للمهارات المتعلمة ضمن برنامج العلاج للتعامل بصورة إيجابية وصامدة مع أي مشاكل في الوقت الحاضر أو المستقبل.',
            'about_spc_photo' => '',
        ]);
    }
}
