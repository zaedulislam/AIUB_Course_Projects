using HireABook.Entity;
using HireABook.Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace HireABook.Web.UI.Controllers
{
    public class AdminController : Controller
    {
        // GET: Admin

        BookInfoRepo bookInfoRepoOb = new BookInfoRepo();
        GenreInfoRepo genreInfoRepo = new GenreInfoRepo();
        UserInfoRepo userInfoRepoOb = new UserInfoRepo();
        public ActionResult Index()
        {
            List<BookInfo> bookInfoList = bookInfoRepoOb.GetAll();
            foreach (var item in bookInfoList)
            {
                item.GenreName = genreInfoRepo.GetById(item.GenreId).GenreName;
                item.UserName = userInfoRepoOb.GetById(item.UserId).UserName;
            }
            return View(bookInfoList);
        }

        public ActionResult ChangeBookApprove(int id)
        {
            BookInfo bookInfo = bookInfoRepoOb.GetAllByBookId(id);
            if (bookInfo.IsApproved == false)
            {
                bookInfo.IsApproved = true;
            }
            else
            {
                bookInfo.IsApproved = false;
            }
            bookInfoRepoOb.UpdateBookInfo(bookInfo);
            return Redirect("/Admin/Index");
        }
    }
}