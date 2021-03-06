package Tests.TestCases;

import static org.testng.Assert.fail;

import java.util.Random;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import Tests.PageObjects.FrontPage;


public class addNewBeaconWithSameIDsCase {
	
	WebDriver driver;
	FrontPage objFront;
	@BeforeTest
	public void setup() {
		System.setProperty("webdriver.chrome.driver", "D:\\Selenium\\chromedriver.exe");	//PRACA
		driver = new ChromeDriver();
		driver.manage().window().maximize();
		driver.get("https://cityexplorer.000webhostapp.com/");
	}
	
	Random ran = new Random();
	int nxt = ran.nextInt(99999);
	int id = ran.nextInt(999);
	
	@Test
	public void newBeaconWithSameIDs() throws InterruptedException {
		objFront = new FrontPage(driver);
		objFront.setLogin("admin");
		objFront.setPassword("admin");
		objFront.login();
		objFront.addFile("akcja testowa");
		objFront.setMajorID(1);
		objFront.setMinorID(1);
		objFront.setBcnName("beacon nr." +nxt);
		objFront.setBcnGrp("grupa Test");
		objFront.setBcnLoc("miasto Test");
		objFront.setBcnAddr("ulica Test");
		objFront.newBeacon();
		objFront.bcnList();
		Assert.assertEquals(driver.findElement(By.xpath("//div[contains(text(),'"+objFront.getBcnName()+"')]")).getText(), objFront.getBcnName());
		Assert.fail();
	}

	@AfterMethod
	public void closeDriver() throws InterruptedException {
		objFront = new FrontPage(driver);
		Thread.sleep(1000);
		objFront.logout();
        //System.out.println("Test przeprowadzony prawid�owo, Beacon zosta� dodany.");
        driver.quit();
    }
}