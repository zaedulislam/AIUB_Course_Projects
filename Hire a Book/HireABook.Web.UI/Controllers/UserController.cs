using HireABook.Entity;
using HireABook.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace HireABook.Web.UI.Controllers
{
    public class UserController : Controller
    {
        // GET: User
        UserInfoRepo userInfoRepoOb = new UserInfoRepo();
        GenreInfoRepo GenreInfoRepoOb = new GenreInfoRepo();
        BookInfoRepo BookInfoRepoOb = new BookInfoRepo();
  

        public ActionResult Index()
        {
            return View(userInfoRepoOb.GetAll());
        }

        [HttpGet]
        public ActionResult AddBooks()
        {
            if (Session["userName"] == null)
            {
                return Redirect("/Home/Register");
            }

            List<SelectListItem> GenreList = new List<SelectListItem>();
            GenreList.AddRange(GenreInfoRepoOb.GetAll().Select(x => new SelectListItem() {
                Text = x.GenreName,
                Value = x.GenreId.ToString(),
                
            }));

            ViewBag.GenreList = GenreList;
            return View();
        }

        [HttpPost]
        public ActionResult AddBooks(BookInfo BookInfoForm)
        {
            if (ModelState.IsValid)
            {
                UserInfo userInfoOb = userInfoRepoOb.GetByUserName(Session["userName"].ToString());

                BookInfoForm.SearchCount = 0;
                BookInfoForm.AddedBy = Session["userName"].ToString();
                BookInfoForm.IsApproved = false;
                BookInfoForm.IsAvailable = true;
                BookInfoForm.UploadDate = DateTime.Now;
                BookInfoForm.UserId = userInfoOb.UserId;

                BookInfoRepoOb.InsertBookInfo(BookInfoForm);
                return RedirectToAction("ShowMyUploads");
            }
            
            return RedirectToAction("AddBooks");
        }

        public ActionResult ShowMyUploads()
        {
            if (Session["userName"]==null)
            {
                return Redirect("/Home/Register");
            }

            UserInfo userInfoOb = userInfoRepoOb.GetByUserName(Session["userName"].ToString());

            List<BookInfo> bookInfoList = BookInfoRepoOb.GetAllById(userInfoOb.UserId);

            foreach (var item in bookInfoList)
            {
                item.GenreName = GenreInfoRepoOb.GetById(item.GenreId).GenreName;
            }

            return View(bookInfoList);
        }

        public ActionResult ShowMyProfile()
        {
            if (Session["userName"] == null)
            {
                return Redirect("/Home/Register");
            }

            UserInfo userInfoOb = userInfoRepoOb.GetByUserName(Session["userName"].ToString());

            return View(userInfoOb);
        }

        public ActionResult UpdateProfile(UserInfo UpdateForm)
        {
            if (Session["userName"] == null)
            {
                return Redirect("/Home/Register");
            }

            if (ModelState.IsValid)
            {
                UserInfo oldUserInfoOb = userInfoRepoOb.GetByUserName(Session["userName"].ToString());
                oldUserInfoOb.FirstName = UpdateForm.FirstName;
                oldUserInfoOb.LastName = UpdateForm.LastName;
                oldUserInfoOb.PhoneNo = UpdateForm.PhoneNo;
                oldUserInfoOb.Password = UpdateForm.Password;
                oldUserInfoOb.City = UpdateForm.City;
                oldUserInfoOb.Thana = UpdateForm.Thana;
                oldUserInfoOb.Area = UpdateForm.Area;

                userInfoRepoOb.UpdateUserInfo(oldUserInfoOb);
            }


            return Redirect("/User/ShowMyProfile");
        }

        public ActionResult BookDetails(int id)
        {
            BookInfo bookInfoList = BookInfoRepoOb.GetAllByBookId(id);
            bookInfoList.GenreName = GenreInfoRepoOb.GetById(bookInfoList.GenreId).GenreName;
            bookInfoList.UserName = userInfoRepoOb.GetById(bookInfoList.UserId).UserName;
            return View(bookInfoList);
        }
    }
}