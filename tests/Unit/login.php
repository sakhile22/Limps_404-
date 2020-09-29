namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class PostOfferTest extends TestCase
{

    public function testPostOffer() {
        $user = new User([
            'username' => "2000",
            'password' => "lambos"
          
        ]);   

        $this->assertEquals('2000', $user->username);
        $this->assertEquals('lambos', $user->password);
      
    }

}
