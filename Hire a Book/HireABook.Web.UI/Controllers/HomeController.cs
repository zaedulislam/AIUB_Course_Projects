using HireABook.Entity;
using HireABook.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace HireABook.Web.UI.Controllers
{
    public class HomeController : Controller
    {
        UserInfoRepo userInfoRepoOb = new UserInfoRepo();
        BookInfoRepo bookInfoRepoOb = new BookInfoRepo();
        // GET: Home
        public ActionResult Index()
        {
            List<BookInfo> bookInfos = bookInfoRepoOb.GetAll().Where(x => x.IsApproved == true).ToList();
            return View(bookInfos);
        }

        [HttpGet]
        public ActionResult Register()
        {
            return View();
        }

        [HttpPost]
        public ActionResult RegisterUser(UserInfo userInfoOb)
        {
            
            if(ModelState.IsValid)
            {
                userInfoOb.UserRole = 1;
                userInfoOb.CreatedDate = DateTime.Now;
                userInfoOb.LastSeen = DateTime.Now;
                userInfoOb.IsActive = true;

                int ret = userInfoRepoOb.InsertUserInfo(userInfoOb);

                if (ret > 0)
                    TempData["Message"] = "Registration Successful";
                else
                    TempData["Message"] = "Registration Failed";
            }
            
            return View("Register");

        }

        [HttpPost]
        public ActionResult Login(FormCollection LoginInfo)
        {
            UserInfo userInfoOb = userInfoRepoOb.GetByUserName(LoginInfo["userName"]);
            if(userInfoOb != null)
            {
                if(LoginInfo["password"] == userInfoOb.Password)
                {
                    Session["userName"] = LoginInfo["userName"];
                    return Redirect("/");
                }
            }

            TempData["Message"] = "Login Failed";

            return RedirectToAction("Register");
        }

        public ActionResult LogOut()
        {
            Session.Abandon();
            return Redirect("/");
        }

    }

}