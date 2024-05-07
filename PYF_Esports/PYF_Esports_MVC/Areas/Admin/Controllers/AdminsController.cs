using Microsoft.AspNetCore.Mvc;

namespace PYF_Esports_MVC.Areas.Admin.Controllers
{
    [Area("Admin")]
    public class AdminsController : Controller
    {
        public IActionResult Login()
        {
            return View();
        }
    }
}
