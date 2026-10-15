<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefreshBookCatalogSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $now = now();

            // 1. Cập nhật 5 danh mục, giữ nguyên ID
            $categories = [
                1 => [
                    'Lãng mạn',
                    'Tiểu thuyết và truyện tình cảm.',
                ],
                2 => [
                    'Văn học thiếu nhi',
                    'Truyện và tác phẩm dành cho thiếu nhi.',
                ],
                3 => [
                    'Văn học hiện đại',
                    'Tác phẩm văn học Việt Nam và thế giới.',
                ],
                4 => [
                    'Trinh thám – Kinh dị',
                    'Truyện phá án, bí ẩn và kinh dị.',
                ],
                5 => [
                    'Phiêu lưu – Ly kỳ',
                    'Những câu chuyện phiêu lưu và khám phá.',
                ],
            ];

            foreach ($categories as $id => $category) {
                DB::table('categories')
                    ->where('id', $id)
                    ->update([
                        'name' => $category[0],
                        'description' => $category[1],
                        'updated_at' => $now,
                    ]);
            }

            // Mỗi quyển gồm: tên, tác giả, giá, số lượng, mô tả
            $catalog = [
                // DANH MỤC 1: LÃNG MẠN
                1 => [
                    ['BIẾN SỐ TÌNH YÊU', 'Helen Hoàng', 206000, 20, 'Stella tin rằng tình yêu có thể tính toán bằng toán học, cho đến khi gặp Michael và nhận ra tình cảm không theo bất kỳ công thức nào.'],
                    ['MỘT CHUYỆN TÌNH HÀI', 'Emily Henry', 219000, 15, 'Hai nhà văn có quan điểm trái ngược về tình yêu cùng trải qua mùa hè sáng tác, từ đó khám phá những cảm xúc bất ngờ dành cho nhau.'],
                    ['KHỞI ĐẦU CỦA CHÚNG TA', 'Colleen Hoover', 185000, 18, 'Một câu chuyện tình yêu đan xen giữa hiện tại và quá khứ, hé lộ những tổn thương và bí mật ảnh hưởng đến mối quan hệ của hai người.'],
                    ['TÌNH YÊU XẤU XÍ', 'Colleen Hoover', 206000, 12, 'Tate và Miles bước vào mối quan hệ không ràng buộc, nhưng những cảm xúc ngày càng sâu đậm khiến cả hai phải đối mặt với quá khứ đau buồn.'],
                    ['NGHIỆT DUYÊN', 'Thommayanti', 140000, 14, 'Câu chuyện tình yêu giữa những khác biệt về địa vị và định kiến xã hội, nơi các nhân vật phải đấu tranh giữa tình cảm và bổn phận.'],
                    ['EM THUỘC VỀ ANH', 'Emily Giffin', 102000, 10, 'Một người phụ nữ phải đối diện với tình yêu, tình bạn và những lựa chọn khó khăn có thể làm thay đổi cuộc đời mình.'],
                    ['EM SẼ ĐẾN CÙNG CƠN MƯA', 'Ichikawa Takuji', 108000, 12, 'Người vợ đã mất bất ngờ trở về bên chồng và con trai, mở ra khoảng thời gian đoàn tụ kỳ diệu cùng những bí mật về tình yêu.'],
                    ['TRƯỚC LÚC ANH ĐI', 'Jonathan Trogyer', 92000, 16, 'Sau biến cố bất ngờ, một người đàn ông nhìn lại tình yêu và những lựa chọn trong quá khứ để tìm kiếm cơ hội thay đổi tương lai.'],
                    ['TRONG TỪNG HƠI THỞ', 'Nicholas Sparks', 145000, 20, 'Một cuộc gặp gỡ định mệnh mở ra chuyện tình sâu sắc, buộc các nhân vật phải lựa chọn giữa tình yêu, trách nhiệm và những hy sinh.'],
                    ['KHÔNG BAO GIỜ LÀ CUỐI', 'Xuân Quỳnh', 124000, 10, 'Những vần thơ giàu cảm xúc thể hiện khát vọng yêu thương chân thành, niềm tin vào tình yêu và sự gắn bó bền lâu.'],
                ],

                // DANH MỤC 2: VĂN HỌC THIẾU NHI
                2 => [
                    ['BÀ BÁC KHỦNG KHIẾP', 'David Walliams - Tony Ross', 185000, 30, 'Cậu bé Ben cùng bà ngoại tìm cách đối phó với bà bác Alberta độc đoán, người đang âm mưu chiếm lấy ngôi nhà của gia đình.'],
                    ['CẬU BÉ MẶC VÁY', 'David Walliams', 120000, 20, 'Dennis là cậu bé yêu bóng đá nhưng cũng thích thời trang, và cuộc sống của cậu trở nên thú vị khi cậu bắt đầu mặc váy.'],
                    ['MUN ƠI, CHẠY ĐI', 'Nguyễn Phan Quế Mai', 125000, 25, 'Chú chó Mun nhỏ bé phải chạy trốn khỏi những bàn tay tàn ác, trên hành trình tìm kiếm tình yêu thương và một mái ấm bình yên.'],
                    ['BỌ NGỰA -  HIỆP SĨ MỘT TAY', 'Uông Triều', 99000, 22, 'Bọ Ngựa Xanh cùng những người bạn nhỏ bước vào cuộc phiêu lưu giữa miền đồng nội, qua đó khám phá những bài học về tình bạn, lòng dũng cảm và tình yêu thiên nhiên.'],
                    ['KHU VƯỜN BÍ MẬT', 'Lewis Carroll', 90000, 15, 'Cô bé Mary khám phá một khu vườn bị khóa kín và dần thay đổi nhờ tình bạn, thiên nhiên cùng những điều kỳ diệu.'],
                    ['CHÚ BÉ MANG PYJAMA SỌC', 'John Boyne', 102000, 18, 'Bruno, con trai một sĩ quan Đức Quốc xã, kết bạn với Shmuel ở phía bên kia hàng rào trại tập trung trong Thế chiến thứ hai.'],
                    ['TÌNH YÊU BỌ XÍT', 'Nguyễn Hoàng Diệu Thùy', 130000, 16, 'Câu chuyện tuổi học trò xoay quanh những rung động đầu đời, áp lực học tập và những bối rối khi biết thích một người.'],
                    ['NHỮNG VÌ SAO', 'Alphonse DauDet', 105000, 20, 'Qua lời kể của một người chăn cừu, câu chuyện khắc họa vẻ đẹp dịu dàng của cô gái Stéph anette và những cảm xúc trong đêm dưới bầu trời đầy sao.'],
                    ['ANH CHÀNG KHÔNG GIAN', 'David Walliams', 185000, 24, 'Cô bé Ruth mơ ước khám phá vũ trụ và bất ngờ bước vào cuộc phiêu lưu kỳ thú khi một chiếc đĩa bay rơi xuống trang trại.'],
                    ['HỦ CẢM XÚC', 'Deborah Marcero', 89000, 12, 'Một câu chuyện nhẹ nhàng giúp trẻ nhận biết, gọi tên và trân trọng những cảm xúc khác nhau của mình.'],
                ],

                // DANH MỤC 3: VĂN HỌC HIỆN ĐẠI
                3 =>  [
                    ['BỮA TỐI', 'Herman Koch', 90000, 18, 'Trong một bữa tối tưởng chừng bình thường, hai cặp vợ chồng dần hé lộ những bí mật gia đình và phải đối mặt với lựa chọn đạo đức khó khăn.'],
                    ['THIÊN ĐƯỜNG', 'Kawakami Mieko', 176000, 20, 'Hai học sinh thường xuyên bị bắt nạt tìm thấy sự đồng cảm qua những lá thư, cùng đối diện với bạo lực học đường và nỗi đau của tuổi mới lớn.'],
                    ['MỘT HỌA SĨ PHÙ THẾ', 'Kazuo Ishiguro', 169000, 15, 'Một người bất ngờ bước vào thế giới kỳ lạ và trở thành thám tử Tenkaichi, nơi những vụ án bí ẩn diễn ra với các quy tắc trinh thám khác thường.'],
                    ['KHÔNG TỪ BIỆT', 'Han Kang', 229000, 12, 'Qua hành trình của hai người phụ nữ, tác phẩm khơi lại ký ức đau thương về cuộc thảm sát Jeju và những mất mát bị chôn vùi trong lịch sử Hàn Quốc.'],
                    ['TRĂNG CÂY ĐA', 'Thảo Thái', 268000, 10, 'Ann tưởng như có cuộc sống hoàn hảo trong giới thượng lưu, nhưng những mối quan hệ phức tạp buộc cô đối diện với những góc khuất của tình yêu và chính mình.'],
                    ['BỐ CON CÁ GAI', 'Cho Chang-in', 138000, 16, 'Người cha đơn thân Jeong dốc hết sức chăm sóc cậu con trai Daum mắc bệnh ung thư máu, tạo nên câu chuyện cảm động về tình phụ tử và sự hy sinh.'],
                    ['N.P', 'Banana Yoshimoto', 360000, 22, 'Kazami bị cuốn vào bí ẩn quanh tập truyện N.P của một nhà văn đã qua đời, từ đó khám phá những mối quan hệ gia đình phức tạp và những bi kịch trong quá khứ.'],
                    ['NHỮNG CÔ NÀNG ĐŨA', 'Hân Nhiên', 188000, 25, 'Ba chị em Tam, Ngũ và Lục rời quê lên Nam Kinh tìm việc, từng bước đấu tranh để tự quyết định cuộc đời giữa những định kiến dành cho phụ nữ.'],
                    ['TƯỚNG VỀ HƯU', 'Nguyễn Huy Thiệp', 158000, 14, 'Qua câu chuyện vị tướng già trở về sống cùng gia đình sau khi nghỉ hưu, tác phẩm phản ánh những xung đột về giá trị sống và sự thay đổi của xã hội.'],
                    ['THEO DÒNG', 'Thạch Lam', 68000, 12, 'Tập tiểu luận tập hợp những suy ngẫm tinh tế của Thạch Lam về văn chương, nghề viết và trách nhiệm của người cầm bút.'],
                ],

                // DANH MỤC 4: TRINH THÁM – KINH DỊ
                4 => [
                    ['LỜI NGUYỀN CỦA THÁM TỬ LỪNG DANH', 'Higashino Keigo', 185000, 20, 'Một người bất ngờ bước vào thế giới khác và trở thành thám tử Tenkaichi, nơi những vụ án kỳ lạ che giấu bí mật về một thị trấn bí ẩn.'],
                    ['QUY TẮC CỦA THÁM TỬ LỪNG DANH', 'Higashino Keigo', 188000, 18, 'Những vụ án kỳ quái diễn ra trong một thế giới trinh thám khác thường, nơi các quy tắc phá án quen thuộc bị đảo lộn.'],
                    ['PHÍA SAU NGHI CAN X', 'Higashino Keigo', 155000, 20, 'Một thiên tài toán học âm thầm giúp người phụ nữ hàng xóm che giấu tội ác, mở ra cuộc đấu trí căng thẳng với nhà vật lý Yukawa.'],
                    ['NHÀ ẢO THUẬT ĐEN VÀ NHỮNG NGƯỜI PHỤ NỮ THỨC TỈNH', 'Higashino Keigo', 205000, 15, 'Những bí ẩn xoay quanh nhà ảo thuật đen và các nhân vật nữ dần được hé lộ qua những tình tiết trinh thám bất ngờ.'],
                    ['CHUYỆN TÌNH Ở THẾ GIỚI SONG SONG', 'Higashino Keigo', 215000, 16, 'Một câu chuyện đan xen giữa tình yêu, những lựa chọn cuộc đời và các bí ẩn khiến nhân vật phải nhìn lại thực tại của mình.'],
                    ['THÚ TỘI', 'Minato Kanae', 125000, 18, 'Sau cái chết của con gái, cô giáo Moriguchi quyết định tự thực hiện kế hoạch trả thù những học sinh mà cô tin là thủ phạm.'],
                    ['CÔ GÁI TRONG CABIN SỐ 10', 'Ruth Ware', 159000, 15, 'Nữ nhà báo Lo chứng kiến một người bị ném xuống biển trong chuyến du thuyền, nhưng mọi người khẳng định không có ai mất tích.'],
                    ['HANNIBAL', 'Thomas Harris', 145000, 12, 'Đặc vụ Clarice Starling tiếp tục bị cuốn vào thế giới nguy hiểm của Hannibal Lecter, tên sát nhân thiên tài với trí tuệ đáng sợ.'],
                    ['RỒNG ĐỎ', 'Thomas Harris', 135000, 14, 'Đặc vụ Will Graham tìm cách truy bắt một kẻ giết người hàng loạt và phải nhờ đến sự hỗ trợ nguy hiểm của Hannibal Lecter.'],
                    ['DOCTOR SLEEP: BÁC SĨ AN TỬ', 'Stephen King', 339000, 12, 'Danny Torrance, cậu bé từng sống sót tại khách sạn Overlook, trưởng thành và phải đối mặt với những thế lực săn lùng trẻ em có năng lực đặc biệt.'],
                ],

                // DANH MỤC 5: PHIÊU LƯU – LY KỲ
                5 => [
                    ['TAM QUỐC CƠ MẬT - TẬP 1: NGÀY RỒNG GẶP NẠN', 'Mã Bá Dung', 265000, 18, 'Lưu Bình được bí mật đưa vào cung để thay thế người anh em song sinh, từ đó bước vào cuộc đấu trí nguy hiểm giữa các thế lực cuối thời Đông Hán.'],
                    ['HOÀNG HÔN CỦA BẦY MÃNH THÚ', 'Marc Levy', 189000, 15, 'Nắm quyền lực trong tay, đám mãnh thủ mưu đồ thao túng hỏng thâu tóm tài sản và mở rộng tầm ảnh hưởng đến không giới hạn.'],
                    ['PHÁP SƯ XỨ ANH', 'Cressida Cowell', 150000, 20, 'Từng có phép thuật… nơi xứ Anh, xưa xửa xừa xưa khi chính nó còn chưa biết sau này mình sẽ được đặt tên là Anh quốc.'],
                    ['HAI KINH MƯỜI LĂM NGÀY', 'Mã Bá Dung', 255000, 16, 'Sau vụ nổ khiến Đông cung gặp thảm họa, một nhóm người phải đưa thái tử từ Nam Kinh đến Bắc Kinh trong mười lăm ngày giữa những âm mưu triều đình.'],
                    ['HAI KINH MƯỜI LĂM NGÀY 1 - ĐIỀM GỞ', 'Mã Bá Dung', 245000, 18, 'Thái tử Chu Chiêm Cơ buộc phải chạy trốn từ Nam Kinh về Bắc Kinh trong mười lăm ngày, giữa những cuộc truy sát và âm mưu tranh giành quyền lực.'],
                    ['MÊ CUNG CỦA LINH HỒN', 'Carlos Ruiz Zafón', 369000, 12, 'Nữ điều tra viên Alicia cùng đồng sự lần theo vụ mất tích bí ẩn của một bộ trưởng, dần khám phá mạng lưới tội ác gắn với quá khứ đen tối của Tây Ban Nha.'],
                    ['GRASSHOPPER SÁT THỦ BÁO THÙ', 'Isaka Kotaro', 160000, 15, 'Ba người đàn ông với những mục đích khác nhau bị cuốn vào thế giới sát thủ, nơi cuộc săn đuổi nguy hiểm có thể biến bất kỳ ai thành con mồi.'],
                    ['CHÚA TỂ NHỮNG CHIẾC NHẪN - ĐOÀN HỘ NHẪN', 'J. R. R. Tolkien', 190000, 14, 'Chàng Hobbit Frodo rời quê hương cùng Đoàn Hộ Nhẫn để thực hiện nhiệm vụ tiêu hủy chiếc Nhẫn Chủ, ngăn bóng tối thống trị Trung Địa.'],
                    ['VẢI TIẾN TRƯỜNG AN', 'Mã Bá Dung', 149000, 20, 'Viên quan nhỏ Lý Thiện Đức nhận nhiệm vụ vận chuyển vải tươi từ Lĩnh Nam đến Trường An trước sinh nhật Dương Quý Phi, mở ra hành trình đầy gian nan và thử thách.'],
                    ['THẾ GIỚI ATLANTIS', 'A. G. Riddle', 185000, 12, 'Giữa thảm họa toàn cầu và những tín hiệu bí ẩn từ vũ trụ, Kate Warner cùng David Vale chạy đua với thời gian để khám phá bí mật của nền văn minh Atlantis.'],
                ],
            ];

            // Lấy sách hiện có theo tên để tránh cập nhật nhầm.
            $existingBooks = DB::table('books')
                ->get()
                ->keyBy('title');

            foreach ($catalog as $categoryId => $books) {
                foreach ($books as $book) {
                    [$title, $author, $price, $quantity, $description] = $book;

                    $data = [
                        'category_id' => $categoryId,
                        'title' => $title,
                        'author' => $author,
                        'price' => $price,
                        'quantity' => $quantity,
                        'description' => $description,
                        'updated_at' => $now,
                    ];

                    if ($existingBooks->has($title)) {
                        DB::table('books')
                            ->where('id', $existingBooks[$title]->id)
                            ->update($data);
                    } else {
                        $data['created_at'] = $now;
                        $data['image'] = null;

                        $newId = DB::table('books')->insertGetId($data);

                        $existingBooks->put($title, (object) [
                            'id' => $newId,
                            'title' => $title,
                        ]);
                    }
                }
            }
        });
    }
}
